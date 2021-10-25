@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TASKS') }}</div>

    {{--sukurimo mygtukas--}}
    <form method="GET" action="{{route('task.create') }}">

        @csrf
        <button class="btn btn-success" type="submit">Create</button>
    </form>

    {{--paieskos laukelis--}}
    <form action="{{route("task.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>
    </form>


    <table class="table table-striped">

        <tr>

            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'TITLE')</th>
                <th>@sortablelink('description', 'DESCRIPTION' )</th>
                <th>@sortablelink('type_id', 'TYPE' )</th>
                <th>Actions</th>
            </tr>


        @if(session()->has('error_message'))
            <div class="alert alert-danger">
                {{session()->get("error_message")}}
            </div>
        @endif

        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get("success_message")}}
            </div>
        @endif

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
