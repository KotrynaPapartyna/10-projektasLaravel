@extends('layouts.app')

@section('content')

{{--VEIKIA--}}

<div class="container">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li>{{$error}}</li>
                </ul>
            </div>
        @endforeach
    @endif


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW TYPE') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('type.store')}}" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('Type Title') }}</label>
                            <div class="col-md-6">
                                <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label" >{{ __('Type Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form- control summernote" name="description" required>

                                </textarea>
                                @error('description')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_taskid" class="col-sm-3 col-form-label">{{ __('Task title') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_task_id">
                                    @foreach ($tasks as $task)
                                        <option value="{{$task->id}}">{{$task->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button class="btn btn-info" type="submit">
                                    {{ __('CREATE NEW TYPE') }}
                                </button>

                        @csrf

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>


@endsection
