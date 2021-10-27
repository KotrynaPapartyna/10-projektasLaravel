@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TASKS') }}</div>

    {{--SUKURIMO MYGTUKAS--}}
    <form method="GET" action="{{route('task.create') }}">

        @csrf
        <button class="btn btn-success" type="submit">Create</button>
    </form>

    {{--PAIESKOS FORMA--}}
    <form action="{{route("task.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>
    </form>

    {{--RIKIAVIMO FORMA--}}
    <form action="{{route('task.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            {{--jeigu gautas kintamasis yra id- jis turi buti pazymetas--}}
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                {{--kitu atveju- jis nera pazymetas--}}
                @else
                <option value="id">ID</option>
            @endif


            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif

            @if ($collumnName == 'description')
                <option value="description" selected>Description</option>
            @else
                <option value="description">Description</option>
            @endif

            @if ($collumnName == 'type_id')
                <option value="type_id" selected>Type</option>
            @else
                <option value="type_id">Type</option>
            @endif

        </select>

        <select name="sortby">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>

        <button type="submit">SORT</button>

    </form>

    {{--<form action="{{route("task.filter")}}" method="GET">
        @csrf

    REIKIA SUSITVARKYTI FILTRA

        <label for="task_type_id" class="col-md-4 col-form-label text-md-left">{{ __('Task filter') }}</label>
            <div class="col-md-4">
                <select class="form-control" name="task_type_id">
                    @foreach ($types as $type)

                        <option value="{{$type->id}}" @if($type->id == $task->type_id) selected @endif >{{$type->title}}</option>

                    @endforeach
                </select>
            </div>
    </form>--}}


    <table class="table table-striped">

        <tr>

            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'TITLE')</th>
                <th>@sortablelink('description', 'DESCRIPTION' )</th>
                <th>@sortablelink('type_id', 'TYPE' )</th>
                <th>Actions</th>
            </tr>


        {{--@if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{session()->get("error_message")}}
            </div>
        @endif
            NEVEIKIA- DAR TAISYTI
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get("success_message")}}
            </div>
        @endif--}}

        @foreach ($tasks as $task)

                <td> {{$task->id }}</td>
                <td> {{$task->title }}</td>
                <td> {!!$task->description !!}</td>
                <td> {{$task->taskType->title }}</td>


                    <td>

                        <a class="btn btn-warning" href="{{route('task.show', [$task]) }}">Show</a>
                        <a class="btn btn-info" href="{{route('task.edit', [$task]) }}">Edit</a>

                        <form method="POST" action="{{route('task.destroy', [$task]) }}">

                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    </td>
        </tr>

        @endforeach

                </table>
                {!! $tasks->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>



@endsection
