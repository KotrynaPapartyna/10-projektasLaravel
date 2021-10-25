@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT TASK') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="task_id" class="col-sm-3 col-form-label" >{{ __('Task ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$task->id}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="task_title" class="col-sm-3 col-form-label" >{{ __('Task title') }}</label>
                        <div class="col-md-6">
                            <p>{{$task->title}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="task_description" class="col-sm-3 col-form-label" >{{ __('Task description')}}</label>
                        <div class="col-md-6">
                            <p>{!!$task->description!!}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 col-form-label" >{{ __('Task Logo') }}</label>
                        <div class="col-md-6">
                            <img src="{{$task->logo}}" alt="{{$task->title}}" style="width:200px">
                        </div>
                    </div>


                    <a class="btn btn-info" href="{{route('task.index') }}">Back To Tasks List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
