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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT TASK') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('task.update', [$task]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Task title') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{$task->title}}" name="title" autofocus>
                                        @error('title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Task description') }}</label>

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
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Task logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control" name="logo">
                                </div>

                                <img src="{{$task->logo}}" alt='{{$task->title}}' />
                            </div>

                            {{--pradzios data- privaloma--}}
                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Startdate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date"/>
                                @error('start_date')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        {{--pabaigos data- privaloma--}}
                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Enddate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date"/>
                                @error('end_date')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
