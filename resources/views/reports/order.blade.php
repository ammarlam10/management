
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;

    }
    .image {
        padding:50;
    }
</style>
<head>
    <h1>SALES ORDER</h1>
    <h2></h2>
    <hr>
    <br>


</head>
<body>



{{--@foreach($orders as $po)--}}

    <p><strong>SALES ORDER ID:</strong> {{$orders->id}}</p>
    <p><strong>PARTY:</strong> {{$orders->party->name}}</p>
    <p><strong>TOTAL:</strong> {{$orders->total}}</p>
    <p><strong>DATE:</strong> {{$orders->sdate}}</p>

{{--@endforeach--}}


<hr>
<br>

<table width="100%">
    <thead>
    <tr>
        <!-- <th>ID</th> -->
        <th>S#</th>
        <th>NAME</th>
        <th>IMAGE</th>
        <th>Type</th>
        <th>QUANTITY</th>
        <th>RATE</th>
    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($orders->design as $pos)
        <tr>
             <td>{{$i++}}</td>
            <td>{{$pos->name}}</td>
            <td><img src="{{$pos->img}}" width="200" height="200"></td>
            <td>{{$pos->pivot->type}}</td>
            <td>{{$pos->pivot->draft_qty}}</td>
            <td>{{$pos->pivot->rate}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{--<p id="image"><img src="{{$pos->img}}" width="200" height="200"></p>--}}



</body>
</html>