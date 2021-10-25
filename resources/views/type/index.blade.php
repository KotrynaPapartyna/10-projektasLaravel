@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TYPES') }}</div>

    <form method="GET" action="{{route('type.create') }}">

        @csrf
        <button class="btn btn-success" type="submit">Create</button>
    </form>

    <table class="table table-striped">

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>


        @foreach ($types as $type)

            </tr>
                    <td>{{$type->id}}</td>
                    <td>{{$type->title}}</td>
                    <td>{{$type->description}}</td>


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
            </div>
        </div>
    </div>
</div>
@endsection
