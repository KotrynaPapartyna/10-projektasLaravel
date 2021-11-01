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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT OWNER') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('owner.update', [$owner]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Name') }}</label>
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
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Owner Surname') }}</label>
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
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Owner Email') }}</label>
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
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Owner Phone') }}</label>
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
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Startdate') }}</label>

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
                            <label for="updated_at" class="col-md-4 col-form-label text-md-right">{{ __('Enddate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at"/>
                                @error('updated_at')
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



@endsection
