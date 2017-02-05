
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;

    }

</style>
<head>
    <h1>Sales Report</h1>
    <hr>
    <br>


</head>
<body>


<p>Between  {{$from}}   and   {{$to}}</p>
{{--@foreach($orders as $po)--}}

{{--<p><strong>SALES ORDER ID:</strong> {{$orders->id}}</p>--}}
{{--<p><strong>PARTY:</strong> {{$orders->party->name}}</p>--}}
{{--<p><strong>TOTAL:</strong> {{$orders->total}}</p>--}}
{{--<p><strong>DATE:</strong> {{$orders->sdate}}</p>--}}

{{--@endforeach--}}


<hr>
<br>

<table width="100%">
    <thead>
    <tr>
        <!-- <th>ID</th> -->
        <th>S#</th>
        <th>Date</th>
        <th>Party</th>
        <th>Design</th>
        <th>Rate</th>
        <th>Quantity</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($order as $pos)
{{--        @foreach([1,2,3,4,5,6,7,8,9,10] as $a)--}}
        <tr>
            <td>{{$i++}}</td>
            <td>{{$pos->date}}</td>
            <td>{{$pos->party}}</td>
            <td>{{$pos->design}}</td>
            <td>{{$pos->rate}}</td>
            <td>{{$pos->qty}}</td>
            <td>{{$pos->qty * $pos->rate}}</td>
        </tr>
    @endforeach
	<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
            <td>Grand total</td>
            <td>{{$gt}}</td>
        </tr>
    {{--@endforeach--}}
    </tbody>
</table>
{{--<p id="image"><img src="{{$pos->img}}" width="200" height="200"></p>--}}



</body>
</html>