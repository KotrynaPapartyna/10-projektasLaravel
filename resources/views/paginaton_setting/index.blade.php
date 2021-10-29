@extends('layouts.app')

@section('content')

<div class="container">

    {{--SUTVARKYTI--}}

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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TYPES') }}</div>

     {{--SUKURIMO MYGTUKAS--}}
    <form method="GET" action="{{route('type.create') }}">

        @csrf
        <button class="btn btn-success" type="submit">Create</button>
    </form>

    {{--PAIESKOS FORMA--}}
    <form action="{{route("type.search")}}" method="GET">
        @csrf

        <input type="text" name="search" placeholder="Enter searc key"/>
        <button type="submit">search</button>
    </form>


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

    <table class="table table-striped">

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>

        </tr>


                    @foreach ($types as $type)


                    <td>{{$type->id}}</td>
                    <td>{{$type->title}}</td>
                    <td>{!!$type->description!!}</td>


                    <td>

                        <a class="btn btn-warning" href="{{route('type.show', [$type]) }}">Show</a>
                        <a class="btn btn-info" href="{{route('type.edit', [$type]) }}">Edit</a>

                        <form method="POST" action="{{route('type.destroy', [$type]) }}">

                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>


                    </td>
            </tr>

        @endforeach
                </table>

                {!! $types->appends(Request::except('page'))->render() !!}

            </div>
        </div>
    </div>
</div>
@endsection
