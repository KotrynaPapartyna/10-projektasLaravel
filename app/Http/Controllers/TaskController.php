<?php

namespace App\Http\Controllers;

use App\Task;
use App\Type;


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
        $collumnName=$request->collumnname;
        $sortby=$request->sortby;

        //Task::orderBy('id', 'desc')->get();

        if (!$collumnName && !$sortby) {
           $collumnName='id';
            $sortby='asc';
        }

        $tasks=Task::orderBy( $collumnName, $sortby)->paginate(5);

        return view('task.index', ['tasks'=>$tasks, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        $types= Type::all();
        return view("task.create", ["task"=>$task, "types"=>$types]);
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

        // Pavadinimas yra privalomas ir turi buti unikalus, kiek simboliu leisti ivesti
        // Neturi leisti prideti iraso su tokiu pat pavadinimu, jei jis yra randamas, duomenu bazeje

        //  3. Task redagavime ir pridėjime uždėti tikrinimą,
        // kad pabaigos data(end_date) nebūtų ansktesnė nei pradžios(start_date).


        // if($end_date > $start_date ) - pabaigos data po pradzios datos(after)
        //if ($start_date < $endate) - pradzios data yra pries pabaigos data(before)

        //after:
        //before:


        //paint
        //paveiksliuko tipas

        //jpg, png, gif ...

        // validacijos nurodymas, gali buti pritaikytas ivairus,
        // keiciama recources. validation.php)
        $validateVar = $request->validate([

            // specialiuju simboliu ivedimo draudimas
            // 'title' => 'required', 'min:6', 'unique:tasks|alpha',// leidzia ivesti tik raides
            // 'title' => 'required', 'min:6', 'unique:tasks|alpha_num' // skaiciai+tekstas
            // 'title' => 'required', 'min:6', 'unique:tasks|regex:/^[a-zA-Z0-9]+$/u', //0-9,A-Z

            'title' => 'required|min:6|unique:tasks',
                // 'title' => ['required', 'min:6', 'unique:tasks'],
            //'task_description' => 'required|min:6',
            'task_description' => 'required|min:6|max:50',
                // 'number' => 'numeric|integer' //ar tai yra skaicius, ir jis yra sveikasis
                // 'number' => 'digits:3', // 1. jinai patikrina ar tai yra skaicius 2. ar skaicius turi 3 skaitmenis
                // 'logo' => 'image|mimes:jpg,jpeg',
                //kaip leisti ikelti tik lankomumo ataskaitos formata?
                //'logo' => 'file|max:2048', //kai max funkcija yra naudoja su file, skaicius reiskia dydi kilobaitais
                //'number' => 'digits_between:1,3',
                //'qty' => 'numeric|gte:max_qty',// gt - greater than qty > 0; gte = qty >=0
                                        // lt - less tahn qty < skaicius, lte = qty <= skaicius
                // 'max_qty' => 'numeric',
                'start_date' => 'required|date', //required|date|before:end_date
                'end_date' => 'required|date|after:start_date', // PABAIGOS DATA- VELIAU UZ PR.
                //uzpildytas
                // 'type_id' => 'required'
               // 'type_id' => 'required|integer', // kad nebutu keiciamas is skaiciaus i zodzius ir pan
               'type_id' => 'numeric|integer|lte:'.$type_count, // kad neprikurtu neegzistuojanciu tipu
                //'test_checkbox'=> 'accepted'  // checkbox yra 1 arba 0- laukelis yra privalomas/ frontende- neprivalomas requered

                // regex- sintakse ieskoti tekste pasikartojanciu pattern

            ]);

        // veikia ifas: validate funkcija nutraukia store funkcijos  veikima
        // jeigu ivyksta klaida: duomenys apie klaida yra patalpinami i $errors kintamaji
        //$errors kintamasis savyje turi 0 erroru

        $task->title=$request->task_title;
        $task->description=$request->task_description;
        $task->type_id = $request->type_id;

        if ($request->has('task_logo')) {

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
        //$types_count=$types->count();

        return view("task.show",["task"=>$task, "types"=> $types]);
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
            'start_date' => 'required|date', //required|date|before:end_date
            'end_date' => 'required|date|after:start_date', // PABAIGOS DATA- VELIAU UZ PR.
        ]);

        $task->title=$request->task_title;
        $task->description=$request->task_description;
        $task->type_id = $request->type_id;
        $task ->logo = $request->task_logo;

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

    public function filter(Request $request) {


    }

}
