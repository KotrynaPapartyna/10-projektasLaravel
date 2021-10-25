@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW TASK') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('task.store')}}" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="task_title" class="col-sm-3 col-form-label" >{{ __('Task Title') }}</label>
                            <div class="col-md-6">
                            <input id="task_title"type="text" class="form-control" name="task_title" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="task_description" class="col-sm-3 col-form-label">{!!'Task description'!!}</label>

                            <div class="col-md-6">
                                <textarea class="summernote" name="task_description" cols="5" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label">{{ __('Task Logo') }}</label>
                        <div class="col-md-6">
                            <input id="logo" type="file" class="form-control" name="logo" required autofocus>
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

