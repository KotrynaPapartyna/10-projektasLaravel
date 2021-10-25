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
    public function create()
    {
        $types= Type::all();
        return view("task.create", ["types" =>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task=new Task();

        $task->title=$request->task_title;
        $task->description=$request->task_description;
        $task->type_typeid = $request->task_typeid;
        $task ->logo = $request->task_logo;


        //if ($request->has('logo')) {

            //$imageName=time().'.'.$request->logo->extension();
            //$task->logo= '/images/'.$imageName;

            //$request->logo->move(public_path('images'), $imageName);
            //} else {
                //$task->logo= '/images/placeholder.png';
            //}

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
        return view("task.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $types = Type::all();
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
        $task->title=$request->task_title;
        $task->description=$request->task_description;
        $task->type_typeid = $request->task_typeid;
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
        $types_count = $task->taskTypes->count();

        if($types_count!=0) {
            return redirect()->route("task.index")->with('error_message','The Task cannot be deleted because he has a type');
        }

        $task->delete();
        return redirect()->route("task.index")->with('success_message','The Task was successfully deleted');
    }


    public function search(Request $request) {

            $search=$request->search;
            $tasks= Task::query()->sortable()->where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(5);

        return view ('task.search', ['tasks'=>$tasks]);
    }
}

