@extends('layouts.app')
@section('content')


    <div class="col-xs-6 col-xs-offset-3 ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> Gallary </div>
                    <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/design') }}">
        {{ csrf_field() }}


        {{--*********************NAME*************************--}}

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>
        </div>


        {{--*********************Image*************************--}}

        <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
            <label for="cp" class="col-md-4 control-label">Image</label>

            <div class="col-md-6">
                <input type="file" name="img" id="img">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Add
                </button>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>
@stop