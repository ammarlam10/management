@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All Sales Draft</div>
                    <div class="panel-body">
                        {{--<a  href="{{route('order_gp')}}" class="btn-sm btn-success">Group Report</a>--}}
                        {{--<td > <a style="color: #096e9c" href="{{route('order', ['id' => $order->id])}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>--}}

                        <table class="table">
                            <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Order Date</th>
                                <th>Party</th>
                                <th>Design</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                {{--@if($order->pivot->is_draft==0)--}}
                                @foreach($order->design as $dis)
                                 @if($dis->pivot->is_draft==1)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td> {{$order->sdate}}</td>
                                    <td>{{$order->party->name}} </td>
                                    <td><img src="/{{$dis->img}}" width="40" height="40"> </td>
                                    <td><a href="order/{{$order->id}}">convert</a> </td>
                                    <td > <a style="color: #096e9c" href="{{route('order', ['id' => $order->id])}}"><span class="btn-success btn-xs ">report</span></a></td>
                                    {{--<td><a href="/order/{{$order->id}}">asd </td>--}}

                                    <td>
                                        <form  method="post" action="/order/{{$dis->pivot->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="oid" value="{{$order->id}}">
                                            <input type="hidden" name="id" value="{{$dis->pivot->id}}">
                                            <div>
                                                <div >
                                                    <input type="submit" value="delete"  class = 'btn-xs btn-primary'>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    {{--<td > <a style="color: #096e9c" href="{{route('order', ['id' => $order->id])}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>--}}


                                </tr>
                             @endif
                            @endforeach
                            @endforeach

                            </tbody>
                        </table>


                        <button  onclick="location.href = '{{url('order/create')}}';" id="myButton" class="btn btn-primary btn-lg btn-block" >New draft</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection