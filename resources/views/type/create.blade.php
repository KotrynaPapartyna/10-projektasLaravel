@extends('layouts.app')

@section('content')

{{--VEIKIA--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW TYPE') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('type.store')}}" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="type_title" class="col-sm-3 col-form-label" >{{ __('Type Title') }}</label>
                            <div class="col-md-6">
                            <input id="type_title"type="text" class="form-control" name="type_title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_description" class="col-sm-3 col-form-label" >{{ __('Type Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="summernote" name="type_description" cols="5" rows="5"></textarea>
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
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-info" type="submit">
                                    {{ __('Create') }}
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
