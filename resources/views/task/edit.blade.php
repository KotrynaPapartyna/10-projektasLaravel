@extends('layouts.app')

{{--VEIKIA--}}
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT TASK') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('task.update', [$task]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="task_title" class="col-md-4 col-form-label text-md-right">{{ __('Task title') }}</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="task_title" value="{{$task->title}}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_description" class="col-md-4 col-form-label text-md-right">{{ __('Task description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote" name="task_description" cols="5" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="type_id" class="col-md-4 col-form-label text-md-right">{{ __('Task Type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type_id">

                                        @foreach ($types as $type)

                                            <option value="{{$type->id}}" @if($type->id == $task->type_id) selected @endif >{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="task_logo" class="col-md-4 col-form-label text-md-right">{{ __('Task logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control" name="task_logo">
                                </div>

                                <img src="{{$task->logo}}" alt='{{$task->title}}' />
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SAVE') }}
                                    </button>
                                </div>
                            </div>
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
