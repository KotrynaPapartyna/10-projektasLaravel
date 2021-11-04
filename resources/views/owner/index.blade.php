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

    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('owner.create') }}">
                    @csrf
                    <button class="btn btn-success" type="submit">CREATE NEW OWNER</button>
                </form>
            </th>


        {{--TYPE MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('type.index') }}">
                    @csrf
                    <button class="btn btn-warning" type="submit">ALL TYPES LIST</button>
                </form>
            </th>

        {{--TASKS MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('task.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL TASKS LIST</button>
                </form>
            </th>
        </tr>
    </table>
    {{--PAIESKOS FORMA- kol kas nereikalinga
    <form action="{{route("owner.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>
    </form>--}}

    {{--RIKIAVIMO FORMA--}}
    <form action="{{route('owner.index')}}" method="GET">
        @csrf
        <select name="collumnname">

            {{--jeigu gautas kintamasis yra id- jis turi buti pazymetas--}}
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                {{--kitu atveju- jis nera pazymetas--}}
                @else
                    <option value="id">ID</option>
            @endif


            @if ($collumnName == 'name')
             <option value="name" selected>Name</option>
            @else
                <option value="name">Name</option>
            @endif

            @if ($collumnName == 'surname')
                <option value="surname" selected>Surname</option>
            @else
                <option value="surname">Surname</option>
            @endif

            @if ($collumnName == 'email')
                <option value="email" selected>Email</option>
            @else
                <option value="email">Email</option>
            @endif

            @if ($collumnName == 'phone')
                <option value="phone" selected>Phone</option>
            @else
                <option value="phone">Phone</option>
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

            <tr class="table-dark">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('surname', 'Surname' )</th>
                <th>@sortablelink('email', 'E-mail' )</th>
                <th>@sortablelink('phone', 'Phone Number' )</th>
                <th>Created Date</th>
                <th>Updated Date</th>

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
                        <span><a class="btn btn-warning" href="{{route('owner.show', [$owner]) }}">Show</a></span>
                        <span><a class="btn btn-info" href="{{route('owner.edit', [$owner]) }}">Edit</a></span>
                        <th>
                        <form method="POST" action="{{route('owner.destroy', [$owner]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        </th>
                    </td>
        </tr>

        @endforeach

            <a class="btn btn-success" href="{{route('owner.pdf')}}"> Export All Owners List to PDF </a>
                </table>
                {!! $owners->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>



@endsection
