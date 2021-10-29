@extends('layouts.app')

@section('content')

{{--SUTVARKYTI--}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT TYPE') }}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="type_id" class="col-sm-3 col-form-label" >{{ __('Type ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$type->id}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label" >{{ __('Type title') }}</label>
                        <div class="col-md-6">
                            <p>{{$type->title}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type_description" class="col-sm-3 col-form-label" >{{ __('Type description') }}</label>
                        <div class="col-md-6">
                            <p>{{$type->description}}</p>
                        </div>
                    </div>


                    <a class="btn btn-info" href="{{route('type.index') }}">Back To Types List</a>

                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
