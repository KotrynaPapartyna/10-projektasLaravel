@extends('layouts.app')

@section('content')

{{--VEIKIA--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT OWNER') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="owner_id" class="col-sm-3 col-form-label" >{{ __('Owner ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$owner->id}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="owner_name" class="col-sm-3 col-form-label" >{{ __('Owner Name') }}</label>
                        <div class="col-md-6">
                            <p>{{$owner->name}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="owner_surname" class="col-sm-3 col-form-label" >{{ __('Owner Surname')}}</label>
                        <div class="col-md-6">
                            <p>{{$owner->surname}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="owner_email" class="col-sm-3 col-form-label" >{{ __('Owner Email')}}</label>
                        <div class="col-md-6">
                            <p>{{$owner->email}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="owner_phone" class="col-sm-3 col-form-label" >{{ __('Owner Phone') }}</label>
                        <div class="col-md-6">
                            <p>{{$owner->phone}}</p>
                        </div>
                    </div>


                    <a class="btn btn-info" href="{{route('owner.index') }}">Back To Owners List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
