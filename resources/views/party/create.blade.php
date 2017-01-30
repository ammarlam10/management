@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Party</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/party') }}">
                            {{ csrf_field() }}


                            {{--*********************NAME*************************--}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--*********************Area*************************--}}

                            <div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
                                <label for="cp" class="col-md-4 control-label">Contact Person</label>

                                <div class="col-md-6">
                                    <input id="cp" type="text" class="form-control" name="cp" value="{{ old('cp') }}"  >

                                    @if ($errors->has('cp'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            {{--*********************ADDRESS*************************--}}

                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address')}}"  required>

                                    @if ($errors->has('address'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            {{--*********************fax*************************--}}


                            <div class="form-group{{ $errors->has('cell_1') ? ' has-error' : '' }}">
                                <label for="fax" class="col-md-4 control-label">Office</label>

                                <div class="col-md-6">
                                    <input id="cell_1" type="text" class="form-control" name="cell_1" value="{{ old('fax') }}"  >

                                    @if ($errors->has('cell_1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cell_1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--*********************mobile*************************--}}

                            <div class="form-group{{ $errors->has('cell_2') ? ' has-error' : '' }}">
                                <label for="cell_2" class="col-md-4 control-label">Mobile</label>

                                <div class="col-md-6">
                                    <input id="cell_2" type="text" class="form-control" name="cell_2" value="{{ old('cell_2') }}"  >

                                    @if ($errors->has('cell_2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cell_2') }}</strong>
                                    </span>
                                    @endif
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
@endsection
