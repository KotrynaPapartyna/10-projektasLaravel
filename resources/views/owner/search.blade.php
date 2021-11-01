@extends('layouts.app')

@section('content')
    <div class="container">

        {{--VEIKIA--}}
        <form action="{{route("task.search")}}" method="GET">
            @csrf

            <input type="text" name="search" placeholder="Enter searc key"/>
            <button type="submit">search</button>
        </form>

    <table class="table table-striped">
                <tr>
                    <th>@sortablelink('id', 'ID')</th>
                    <th>@sortablelink('title', 'TITLE')</th>
                    <th>@sortablelink('description', 'DESCRIPTION' )</th>
                    <th>@sortablelink('type_id', 'TYPE' )</th>
                </tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td> {{$task->id }}</td>
                        <td> {{$task->title }}</td>
                        <td> {!!$task->description !!}</td>
                        <td> {{$task->taskType->title }}</td>
                    </tr>
                @endforeach
    </table>

    <a class="btn btn-info" href="{{route('task.index') }}">Back To Tasks List</a>

   {!! $tasks->appends(Request::except('page'))->render() !!}

</div>
@endsection
