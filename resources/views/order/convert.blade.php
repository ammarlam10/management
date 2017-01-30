@extends('layouts.app')


@section('content')



    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sales Order</div>

                <div class="panel-body">

                    <form class="form-horizontal" id="jeform" role="form" method="POST" action="/order/{{$order->id}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">

                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group jename">
                                    <strong>Party:</strong>
                                    <select class="form-control" name="pid">
                                            <option value="{{$order->party->id}}">{{$order->party->name}}</option>
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
                                <div class="form-group"><input  type="date"  class="form-control" name="sdate" value="{{$order->sdate}}" required></div>
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

                        @foreach($order->design as $st)

                        <div class="row" id="lines">
                            <div class='form-group'>
                                <div class='col-xs-2 ref'>

                                    <select class="form-control" name="name[]">
                                            <option value="{{$st->id}}">{{$st->name}}</option>
                                    </select>
                                </div>
                                <div class='col-xs-3 l1'>
                                    <input class="form-control" type="text" name="lot[]" value="{{$st->pivot->lot_no}}">
                                </div>
                                <div class='col-xs-2 es'>
                                    <input class="form-control" type="text" name="qty[]" value="{{$st->pivot->draft_qty}}" >
                                </div>
                                <div class='col-xs-2 es'>
                                    <input class="form-control" type="text" name="rate[]"value="{{$st->pivot->rate}}" >
                                </div>


                                <div class='col-xs-2 ref'>

                                    <select class="form-control" name="type[]">
                                        <option value="Single">Single</option>
                                        <option value="Double">Double</option>

                                    </select>
                                </div>

                            </div>


                        </div>
                        @endforeach

                        <div class='row'>
                            <div class="col-xs-12 col-sm-12 col-md-12 alert">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>



                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection