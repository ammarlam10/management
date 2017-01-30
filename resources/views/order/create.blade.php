@extends('layouts.app')


@section('content')



        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sales Order Draft</div>

                    <div class="panel-body">

                        <form class="form-horizontal" id="jeform" role="form" method="POST" action="{{ url('/order') }}">
                            {{ csrf_field() }}
                        {{--{!! Form::open(array('route' => 'order.store','method'=>'POST','id' => 'jeform')) !!}--}}
                        <div class="row">

                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group jename">
                                    <strong>Party:</strong>
                                    <select class="form-control" name="pid">
                                        @foreach($parties as $party)
                                            <option value="{{$party->id}}">{{$party->name}}</option>
                                        @endforeach
                                    </select>


                                </div>

                            </div>
                        </div>


                        <div class='row'>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group"><label >Order Date</label></div>
                            </div>

                        </div>

                        <div class='row'>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group"><input  type="date"  class="form-control" name="sdate" required></div>
                            </div>
                        </div>



                        <div class='row'>
                            <div class="col-xs-offset-9 col-xs-2 ">
                                <button type="button" class="btn btn-primary addButton"><i class="fa fa-plus">Add Design</i></button>
                            </div>

                        </div>






                        <div class='row'>
                            <div class="form-group">
                                <div class="col-xs-2">
                                    <label for="item" class='control-label '>Design</label>
                                </div>
                                <div class="col-xs-3">
                                    <label for="item" class='control-label '>Lot no</label>
                                </div>
                                <div class="col-xs-2">
                                    <label for="qty" class='control-label '>Quantity</label>
                                </div>
                                <div class="col-xs-2">
                                    <label for="disc" class='control-label '>Rate</label>
                                </div>
                                <div class="col-xs-2">
                                    <label for="disc" class='control-label '>Type</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="lines">
                            <div class='form-group'>
                                <div class='col-xs-2 ref'>

                                    <select class="form-control" name="name[]">
                                        @foreach($stock as $st)
                                            <option value="{{$st->id}}">{{$st->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class='col-xs-3 l1'>
                                    <input class="form-control" type="text" name="lot[]" >
                                    {{--{!!Form::text('jel_label[]',null,['class' => 'form-control','placeholder' => 'Quantity','required' => 'required'])!!}--}}
                                </div>
                                <div class='col-xs-2 es'>
                                    <input class="form-control" type="text" name="qty[]" >
                                    {{--{!!Form::text('jel_coa_id[]',0,['class' => 'form-control','placeholder' => 'Discount','required' => 'required'])!!}--}}
                                </div>
                                <div class='col-xs-2 es'>
                                    <input class="form-control" type="text" name="rate[]" >
                                    {{--{!!Form::text('jel_coa_id[]',0,['class' => 'form-control','placeholder' => 'Discount','required' => 'required'])!!}--}}
                                </div>


                                <div class='col-xs-2 ref'>

                                    <select class="form-control" name="type[]">
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>

                                    </select>
                                </div>

                            </div>


                        </div>

                        <div class='row'>
                            <div class="col-xs-12 col-sm-12 col-md-12 alert">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>



                        </form>
                        {{--{!! Form::close() !!}--}}
                        <div class='form-group hide'  id='template'>
                            <div class='col-xs-2 ref'>

                                <select class="form-control" name="name[]">
                                    @foreach($stock as $st)
                                        <option value="{{$st->id}}">{{$st->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='col-xs-3 l1'>
                                <input class="form-control" type="text" name="lot[]" >
                                {{--{!!Form::text('jel_label[]',null,['class' => 'form-control','placeholder' => 'Quantity','required' => 'required'])!!}--}}
                            </div>
                            <div class='col-xs-2 es'>
                                <input class="form-control" type="text" name="qty[]" >
                                {{--{!!Form::text('jel_coa_id[]',0,['class' => 'form-control','placeholder' => 'Discount','required' => 'required'])!!}--}}
                            </div>
                            <div class='col-xs-2 es'>
                                <input class="form-control" type="text" name="rate[]" >
                                {{--{!!Form::text('jel_coa_id[]',0,['class' => 'form-control','placeholder' => 'Discount','required' => 'required'])!!}--}}
                            </div>


                            <div class='col-xs-2 ref'>

                                <select class="form-control" name="type[]">
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>

                                </select>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            jelIndex = 0;

            $('#jeform')

            $('.addButton').on('click', function() {
                jelIndex++;
                console.log('it entered the function');
                var $template = $('#template'),
                        $clone    = $template
                                .clone()
                                .removeClass('hide');
                $('#lines').append($clone);

                console.log('it made the copy');

            });
        });



    </script>
@endsection