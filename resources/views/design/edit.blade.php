{{--                                                        NOT BEING USED                                                      --}}
@extends('layouts.app')
@section('content')


    <div class="col-xs-6 col-xs-offset-3 ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> EDIT </div>
                    <div class="panel-body">

                        <form class="form-inline" action="/design/{{$img->id}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            name:
                            <div class="form-group"> <input type="text" name="name" id="name" value="{{$img->name}}" required></div>
                            <div class="form-group"> <input type="file" name="file" id="file" ></div>
                            <div class="form-group"><button type="submit" class="btn btn-primary">edit</button></div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop