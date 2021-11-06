@extends('layouts.app')

@section('content')

<div class="container">

                {{--pranesimai apie atliktus veiksmus--}}
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

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('TYPES') }}</div>

    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>

        {{--SUKURIMO MYGTUKAS--}}
        <th>
            <form method="GET" action="{{route('type.create') }}">
                @csrf
                <button class="btn btn-success" type="submit">CREATE NEW TYPE</button>
            </form>
        </th>

        {{--pdf mygtukas--}}
        <th>
            <a class="btn btn-dark" href="{{route('type.pdf')}}"> Export All Types List to PDF </a>
        </th>

        {{--OWNER MYGTUKAS--}}
        <th>
            <form method="GET" action="{{route('owner.index') }}">
                @csrf
                <button class="btn btn-warning" type="submit">ALL OWNERS LIST</button>
            </form>
        </th>

        {{--TASKS MYGTUKAS--}}
        <th>
            <form method="GET" action="{{route('task.index') }}">
                @csrf
                <button class="btn btn-secondary" type="submit">ALL TASKS LIST</button>
            </form>
        </th>

        {{--PAIESKOS FORMA--}}
        <th>
            <form action="{{route("type.search")}}" method="GET">
                @csrf
                <input type="text" name="search" placeholder="Enter searc key"/>
                <button type="submit">search</button>
            </form>
        </th>

        </tr>
    </table>

     {{--RIKIAVIMO FORMA--}}
        <form action="{{route('type.index')}}" method="GET">
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

    <table class="table table-striped table-hover table-md">
            <tr>

            <tr class="table-secondary">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>

            </tr>


                    @foreach ($types as $type)

                    <td>{{$type->id}}</td>
                    <td>{{$type->title}}</td>
                    <td>{!!$type->description!!}</td>


                        <th><a class="btn btn-warning" href="{{route('type.show', [$type]) }}">Show</a></th>
                        <th><a class="btn btn-info" href="{{route('type.edit', [$type]) }}">Edit</a></th>
                        <th>
                            <form method="POST" action="{{route('type.destroy', [$type]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </th>

            </tr>
        @endforeach


    </table>

                {!! $types->appends(Request::except('page'))->render() !!}

            </div>
        </div>
    </div>
</div>
@endsection
