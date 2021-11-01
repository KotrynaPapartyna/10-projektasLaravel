@extends('layouts.app')

@section('content')

<div class="container">



    {{--@if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{session()->get("error_message")}}
    </div>
    @endif
    --}}

    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('TASKS') }}</div>
    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('task.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW TASK</button>
                </form>
            </th>


        {{--OWNER MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('owner.index') }}">
                    @csrf
                    <button class="btn btn-warning" type="submit">ALL OWNERS LIST</button>
                </form>
            </th>

        {{--TYPES MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('type.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL TYPES LIST</button>
                </form>
            </th>

        {{--PAIESKOS FORMA--}}
            <th>
                <form action="{{route("task.search")}}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Enter searc key"/>
                    <button type="submit">SEARCH</button>
                </form>
            </th>
        </tr>
    </table>

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

    <table class="table table-striped table-hover table-sm">
        <tr>

            <tr class="table-secondary">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'TITLE')</th>
                <th>@sortablelink('description', 'DESCRIPTION' )</th>
                <th>@sortablelink('type_id', 'TYPE' )</th>
                <th>@sortablelink('name', 'Owner Name' )</th>
                <th>@sortablelink('surname', 'Owner Surname' )</th>
                <th>@sortablelink('created_at', 'Created Date')</th>
                <th>@sortablelink('updated_at', 'Updated Date')</th>

            </tr>


        @foreach ($tasks as $task)

                <td> {{$task->id }}</td>
                <td> {{$task->title }}</td>
                <td> {!!$task->description !!}</td>
                <td> {{$task->taskType->title }}</td>
                <td> {{$task->taskOwner->name }}</td>
                <td> {{$task->taskOwner->surname }}</td>
                <td> {{$task->created_at }}</td>
                <td> {{$task->updated_at }}</td>


                    <td>
                        <th><a class="btn btn-warning" href="{{route('task.show', [$task]) }}">Show</a></th>
                        <th><a class="btn btn-info" href="{{route('task.edit', [$task]) }}">Edit</a></th>

                        <th>
                        <form method="POST" action="{{route('task.destroy', [$task]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </th>

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
