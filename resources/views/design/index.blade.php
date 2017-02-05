@extends('layouts.app')

@section('content')
    <div class="col-xs-12 ">
        <div class="row">
            <div class="container">

            <form class="form-inline" action="{{ url('/design') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            name:
                <div class="form-group"> <input type="text" name="name" id="name" required></div>
                <div class="form-group"> <input type="file" name="file" id="file" ></div>
                <div class="form-group"><button type="submit" class="btn btn-primary">upload</button></div>
            </form>
                <br>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading"> Gallary </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($images as $img)
                            <div class="col-md-2" >
                                <div class="thumbnail">
                                        <img class="img-responsive " src="{{$img->img}}"  >
                                        <div class="caption">{{$img->name}}
                                            <a class="btn-primary btn-xs" href="{{route('design.show',$img->id)}}">edit</a>

                                        </div>

                                </div>
                            </div>
                                @endforeach

                        </div>
                        <div> {{ $images->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection