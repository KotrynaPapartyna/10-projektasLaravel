@extends('layouts.app')

{{--VEIKIA--}}

@section('content')
    <div class="container">

        <form action="{{route("type.search")}}" method="GET">
            @csrf

            <input type="text" name="search" placeholder="Enter searc key"/>
            <button type="submit">search</button>
        </form>

    <table class="table table-striped">
                <tr>
                    <th>@sortablelink('id', 'ID')</th>
                    <th>@sortablelink('title', 'TITLE')</th>
                    <th>@sortablelink('description', 'DESCRIPTION' )</th>

                </tr>
                @foreach ($types as $type)
                    <tr>
                        <td> {{$type->id }}</td>
                        <td> {{$type->title }}</td>
                        <td> {!!$type->description !!}</td>

                    </tr>
                @endforeach
    </table>

    <a class="btn btn-info" href="{{route('type.index') }}">Back To Types List</a>


   {!! $types->appends(Request::except('page'))->render() !!}

</div>
@endsection
