@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="list-group">
                        <a href="/party" class="list-group-item ">Party</a>
                    </div>
                    <div class="list-group">
                        <a href="/order" class="list-group-item ">Drafts</a>
                    </div>
                    <div class="list-group">
                        <a href="/design" class="list-group-item ">Gallary</a>
                    </div>
                    <div class="list-group">
                        <a href="/report/create" class="list-group-item ">Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
