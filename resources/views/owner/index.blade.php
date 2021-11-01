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
                <div class="card-header">{{ __('OWNERS') }}</div>

    {{--SUKURIMO MYGTUKAS--}}
    <form method="GET" action="{{route('owner.create') }}">

        @csrf
        <button class="btn btn-success" type="submit">CREATE NEW OWNER</button>
    </form>

    {{--TYPE MYGTUKAS--}}
    <form method="GET" action="{{route('type.index') }}">

        @csrf
        <button class="btn btn-warning" type="submit">TYPES</button>
    </form>

    {{--TASKS MYGTUKAS--}}
    <form method="GET" action="{{route('task.index') }}">

        @csrf
        <button class="btn btn-secondary" type="submit">TASKS</button>
    </form>

    {{--PAIESKOS FORMA
    <form action="{{route("owner.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>
    </form>--}}

    {{--RIKIAVIMO FORMA
    <form action="{{route('owner.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            jeigu gautas kintamasis yra id- jis turi buti pazymetas
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                kitu atveju- jis nera pazymetas
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

    </form>--}}

    <table class="table table-striped table-hover table-sm">

        <tr>

            <tr class="table-dark">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('surname', 'Surname' )</th>
                <th>@sortablelink('email', 'E-mail' )</th>
                <th>@sortablelink('phone', 'Phone Number' )</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th>Actions</th>
            </tr>


        @foreach ($owners as $owner)

                <td> {{$owner->id }}</td>
                <td> {{$owner->name }}</td>
                <td> {{$owner->surname}}</td>
                <td> {{$owner->email }}</td>
                <td> {{$owner->phone}}</td>
                <td> {{$owner->created_at }}</td>
                <td> {{$owner->updated_at }}</td>

                    <td>

                        <a class="btn btn-warning" href="{{route('owner.show', [$owner]) }}">Show</a>
                        <a class="btn btn-info" href="{{route('owner.edit', [$owner]) }}">Edit</a>

                        <form method="POST" action="{{route('owner.destroy', [$owner]) }}">

                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>

                    </td>
        </tr>

        @endforeach

                </table>
                {{--{!! $tasks->appends(Request::except('page'))->render() !!}--}}
            </div>
        </div>
    </div>

</div>



@endsection
