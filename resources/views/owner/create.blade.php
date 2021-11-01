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
                <div class="card-header">{{ __('CREATE NEW OWNER') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('owner.store')}}" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label" >{{ __('Owner') }}</label>
                            <div class="col-md-6">
                                <input id="name"type="text" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" name="name" autofocus>
                                @error('name')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="surname" class="col-sm-3 col-form-label" >{{ __('Owner Surname') }}</label>
                            <div class="col-md-6">
                                <input id="surname"type="text" class="form-control @error('surname') is-invalid @enderror " value="{{ old('surname') }}" name="surname" autofocus>
                                @error('surname')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label" >{{ __('Owner Email') }}</label>
                            <div class="col-md-6">
                                <input id="email"type="text" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" name="email" autofocus>
                                @error('email')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label" >{{ __('Owner Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone"type="text" class="form-control @error('phone') is-invalid @enderror " value="{{ old('phone') }}" name="phone" autofocus>
                                @error('phone')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--pradzios data- privaloma--}}
                        <div class="form-group row">
                            <label for="created_at" class="col-md-3 col-form-label">{{ __('Startdate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('created_at') is-invalid @enderror" name="created_at"/>
                                @error('created_at')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        {{--pabaigos data- privaloma--}}
                        <div class="form-group row">
                            <label for="updated_at" class="col-md-3 col-form-label">{{ __('Enddate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at"/>
                                @error('updated_at')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <button class="btn btn-info" type="submit">Save new Owner</button>

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
