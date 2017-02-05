@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/report') }}">
                            {{ csrf_field() }}


                            {{--*********************NAME*************************--}}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Party</label>
                                <div class="col-md-4">
                                <select class="form-control col-md-4 control-label" name="id">
                                    <option value="-10">All</option>
                                @foreach($parties as $party)
                                        <option value="{{$party->id}}">{{$party->name}}</option>
                                    @endforeach
                                </select>
                                    </div>
                             </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">From</label>

                                <div class="col-md-4">
                                    <input id="name" type="date" class="form-control" name="from" required autofocus>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">To</label>

                                <div class="col-md-4">
                                    <input id="name" type="date" class="form-control" name="to"  required >

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
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
