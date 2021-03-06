<?php

namespace App\Http\Controllers;

use App\Type;
use App\Task;

use Illuminate\Http\Request;

use PDF;

class TypeController extends Controller
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


        if (!$collumnName && !$sortby) {
           $collumnName='id';
            $sortby='asc';
        }

        $types=Type::orderBy( $collumnName, $sortby)->paginate(2);

        return view('type.index', ['types'=>$types, 'collumnName'=>$collumnName, 'sortby'=>$sortby]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks= Task::all();
        return view ("type.create", ["tasks"=>$tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tasks=Task::all();
        $task_count=$tasks->count();

        $type=new Type;

        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'description' => 'required|min:6|max:1500',

            ]);

        $type->title=$request->type_title;
        $type->description=$request->description;
        //$type->task_id=$request->type_task_id;

        $type->save();

        return redirect()->route("type.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //$tasks=$type->typeTasks;
        //$tasks_count=$tasks->count();
        return view ("type.show", ["type"=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $tasks=Task::all();
        return view("type.edit", ["type"=>$type, "tasks"=>$tasks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {

        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'description' => 'required|min:6|max:1500',

            ]);


        $type->title=$request->type_title;
        $type->description=$request->description;
        //$type->task_id=$request->type_task_id;

        $type->save();

        return redirect()->route("type.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //$types_count = $type->taskTypes->count();

        //if($types_count!=0) {
            //return redirect()->route("type.index")->with('error_message','The Company cannot be deleted because he has a type');
        //}

        $type->delete();
        return redirect()->route("type.index")->with('success_message','The Type was successfully deleted');
    }

    public function search(Request $request) {

        $search=$request->search;
        $types= Type::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

    return view ('type.search', ['types'=>$types]);
}

    // PDF failu generavimo funkcijos- visu tipu
    public function generateTypePDF(Type $type) {

        view()->share('type', $type);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_type_template", $type);

        return $pdf->download("type".$type->id.".pdf");

    }

    // visu Tipu PDF generavimas
    public function generatePDF() {


        $types = Type::all();

        view()->share('types', $types);

        $pdf = PDF::loadView("pdf_templateY", $types);

        // galima pervadinti failo pavadinimus
        return $pdf->download("types.pdf");

    }



}
