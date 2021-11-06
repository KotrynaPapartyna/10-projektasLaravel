@extends('layouts.app')

{{--VEIKIA--}}

@section("content")
    <div class="container">

        {{--zinute apie neuzpildytus laukus--}}
        @if ($errors->any())
        {{-- klaidu bus daugau nei 1 --}}

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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT TYPE') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('type.update', [$type]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="type_title" class="col-md-4 col-form-label text-md-right">{{ __('Type title') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{$type->title}}" name="title" autofocus>
                                    @error('title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Type description') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form- control summernote" value="{{$type->description}}" name="description" required>
                                    </textarea>
                                    @error('description')
                                            <span role="alert" class="invalid-feedback">
                                                <strong>*{{$message}}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">

                                <label for="type_taskid" class="col-md-4 col-form-label text-md-right">{{ __('Task Title') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type_taskid">
                                        @foreach ($tasks as $task)
                                        <option value="{{$task->id}}" @if($task->id == $type->taskid) selected @endif >{{$task->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
