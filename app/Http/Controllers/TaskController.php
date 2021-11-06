<?php

namespace App\Http\Controllers;

use App\Task;
use App\Type;
use App\Owner;

use PDF;


use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $taskTitle = $request->taskTitle; // pavadinimas
        $taskType = $request->taskType; //pagal autoriu

        $filterTasks = Task::all();
        $types = Type::all();

        $collumnName=$request->collumnname;
        $sortby=$request->sortby;

        //Task::orderBy('id', 'desc')->get();

        if (!$collumnName && !$sortby) {
           $collumnName='id';
            $sortby='asc';
        }

        $tasks=Task::orderBy( $collumnName, $sortby)->paginate(5);

        if($taskTitle) {
            //vykdoma filtracija sortable()
            $tasks = Task::sortable()->where('title', $taskTitle)->paginate(10); //sortable()
        } else if ($taskType) {
            $tasks = Task::sortable()->where('type_id', $taskType)->paginate(10); //sortable()
        }
        else {
            $tasks = Task::sortable()->paginate(10); //sortable()
        }

        return view('task.index', ['tasks'=>$tasks, 'types'=>$types, 'filterTasks'=>$filterTasks,'collumnName'=>$collumnName, 'sortby'=>$sortby]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        $types= Type::all();
        $owners= Owner::all();
        return view("task.create", ["task"=>$task, "types"=>$types, "owners"=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types=Type::all();
        $type_count=$types->count();

        $task=new Task();


        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'description' => 'required|min:6|max:1500',
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'type_id'=>'numeric|integer',
            'owner_id'=>'numeric|integer',
            'start_date' => 'required|date', //required|date|before:end_date
            'end_date' => 'required|date|after:start_date', // PABAIGOS DATA- VELIAU UZ PR.
            ]);


        $task->title=$request->title;
        $task->description=$request->description;
        $task->type_id = $request->type_id;
        $task->owner_id = $request->owner_id;

        if ($request->has('logo')) {

            $imageName=time().'.'.$request->logo->extension();
            $task->logo= '/images/'.$imageName;

            $request->logo->move(public_path('images'), $imageName);
            } else {
                $task->logo= '/images/placeholder.png';
            }


        $task->save();

            return redirect()->route("task.index");
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $types = $task->taskTypes;
        $owners=$task->taskOwners;
        //$types_count=$types->count();

        return view("task.show",["task"=>$task, "types"=> $types, "owners"=>$owners]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)

    {

        $types = Type::all()->sortBy("id", SORT_REGULAR, true); // cia pakeitus i false- rikiuos atvirksciai
        // pakeitus i "title" - rikiuos pagal title- pvz abeceles tvarka (desc arba asc)
        return view("task.edit", ["task"=>$task, "types"=>$types]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

       $validateVar = $request->validate([
            'title' => 'required|min:6|max:225|alpha',
            'description' => 'required|min:6|max:1500',
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'type_id'=>'numeric|integer',
            'owner_id'=>'numeric|integer',
            'start_date' => 'required|date', //required|date|before:end_date
            'end_date' => 'required|date|after:start_date', // PABAIGOS DATA- VELIAU UZ PR.
        ]);

        $task->title=$request->title;
        $task->description=$request->description;
        $task->type_id = $request->type_id;
        $task ->logo = $request->logo;

            $task->save();

            return redirect()->route("task.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //$types_count = $task->taskTypes->count();

        //if($types_count!=0) {
            ///return redirect()->route("task.index")->with('error_message','The Task cannot be deleted because he has a type');
        //}

        $task->delete();
        return redirect()->route("task.index")->with('success_message','The Task was successfully deleted');
    }


    public function search(Request $request) {

            $search=$request->search;
            $tasks= Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view ('task.search', ['tasks'=>$tasks]);
    }

    // vienos Task PDF generavimas
    public function generateTaskPDF(Task $task) {

        view()->share('task', $task);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_task_template", $task);

        return $pdf->download("task".$task->id.".pdf");

    }

    // visu Task PDF generavimas
    public function generatePDF() {


        $tasks = Task::all();

        view()->share('tasks', $tasks);

        $pdf = PDF::loadView("pdf_templateT", $tasks);

        // galima pervadinti failo pavadinimus
        return $pdf->download("tasks.pdf");

    }

    public function generateStatisticsPdf()
    {
        // suskaiciuoja visus Task
        $tasks=Task::all();
        $tasksCount=$tasks->count();

        // suskaiciuoja visus Type
        $types=Type::all();
        $typesCount=$types->count();
        // suskaiciuoja visus Owner
        $owners=Owner::all();
        $ownersCount=$owners->count();


        // i vaizda (PDF faila) perduodami visi tipai, visos uzduotys, visi owner. tiek kiek yra, kiek suskaiciavo
        view()->share(["tasksCount" => $tasksCount, 'typesCount' => $typesCount, 'ownersCount' => $ownersCount]);
        // svarbus template pavadinimas
        $pdf=PDF::loadView('pdf_template');

        return $pdf->download("statistics.pdf");
}


}
