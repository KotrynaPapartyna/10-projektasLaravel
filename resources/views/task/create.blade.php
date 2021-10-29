@extends('layouts.app')

@section('content')

{{--VEIKIA--}}

<div class="container">


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


    {{-- kai if'as; jeigu klaida title egizsituoja, vykdomas kazkoks tai kodas --}}
    {{-- atsiranda kintamasis $message -  klaidos zinute --}}
    {{--@error('title')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
    --}}

    {{--@error('description')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
    --}}

    @error('type_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror

    {{-- is-invalid - input parauduonoja --}}
    {{-- @error('title') -veikia kaip if'a --}}



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW TASK') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="task_title" class="col-sm-3 col-form-label" >{{ __('Task Title') }}</label>
                            <div class="col-md-6">
                                <input id="task_title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_description" class="col-sm-3 col-form-label">{!!'Task description'!!}</label>

                            <div class="col-md-6">
                                <textarea class="form- control summernote" name="task_description" required>

                                </textarea>
                                        @error('task_description')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="type_id" class="col-sm-3 col-form-label">{{ __('Task Type') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_id">

                                    @foreach ($types as $type)

                                        <option value="{{$type->id}}" @if($type->id == $task->type_id) selected @endif >{{$type->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">{{ __('Task Logo') }}</label>
                        <div class="col-md-6">
                            <input id="logo" type="file" class="form-control" name="logo">
                            </div>
                        </div>

                        {{--pradzios data- privaloma--}}
                        <div class="form-group row">
                            <label for="start_date" class="col-md-3 col-form-label">{{ __('Startdate') }}</label>

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
                            <label for="end_date" class="col-md-3 col-form-label">{{ __('Enddate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date"/>
                                @error('end_date')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <button class="btn btn-info" type="submit">Save new Task</button>

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
