@extends('layouts.app')

@section('content')
    <div class="col-xs-9 col-xs-offset-3 ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">All Parties </div>
                    <div class="panel-body">

                        <a class="btn btn-primary btn-sm" href="{{ url('/party/create') }}">Add</a>

                        <div class="table-responsive">
                        <table class="table table-hover table-inverse">
                            <thead >
                            <tr>
                                <th>Name</th>
                                <th>Contact Person</th>
                                <th>Address</th>
                                <th>Office</th>
                                <th>Mobile</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($party as $sale)
                                <tr>
                                    <td>   {{$sale->name}}</td>
                                    <td>{{$sale->contact_person}}</td>
                                    <td>{{$sale->address}}</td>
                                    <td>{{$sale->cell_1}}</td>
                                    <td>{{$sale->cell_2}}</td>
                                    <td><a class="btn-primary btn-xs" href="{{route('party.show',$sale->id)}}">edit</a></td>
                                    <td><a class="btn-success btn-xs" href="{{route('party.edit',$sale->id)}}">sales order</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                            </div>

                       <div> {{ $party->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection