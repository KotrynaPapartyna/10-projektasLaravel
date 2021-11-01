@extends('layouts.app')

@section('content')

{{--VEIKIA--}}
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
                        <label for="title" class="col-sm-3 col-form-label" >{{ __('Task title') }}</label>
                        <div class="col-md-6">
                            <p>{{$task->title}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label" >{{ __('Task description')}}</label>
                        <div class="col-md-6">
                            <p>{!!$task->description!!}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type_id" class="col-sm-3 col-form-label" >{{ __('Type ID')}}</label>
                        <div class="col-md-6">
                            <p>{{$task->type_id}} ({{$task->taskType->title }})</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="owner_id" class="col-sm-3 col-form-label" >{{ __('Owner ID')}}</label>
                        <div class="col-md-6">
                            <p>{{$task->owner_id}} ({{$task->taskowner->name}} {{$task->taskowner->surname}})</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 col-form-label" >{{ __('Task Logo') }}</label>
                        <div class="col-md-6">
                            <img src="{{$task->logo}}" alt="{{$task->title}}" style="width:200px">
                        </div>
                    </div>


                    <a href="{{route('task.pdftask', [$task])}}" class="btn btn-primary">Export Task to PDF</a>

                    <a class="btn btn-info" href="{{route('task.index') }}">Back To Tasks List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
