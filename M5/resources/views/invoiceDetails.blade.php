@extends('layout')

@section('main_content')
<h3>Invoice Number: {{$invoice_id}}</h3>

<table border=1> <tr><th>Qty.</th><th>Name</th><th>Price</th><th>Subtotal</th></tr>
	@foreach($results as $row) 
		 <tr><td>{{$row->quantity}}</td>
		 <td>{{$row->name}}</td>
		 <td>{{$row->price}}</td>
		 <td>{{$row->price * $row->quantity}}</td>
		 <td><a href="/invoices/delete/{{$row->invoice_id}},{{$row->id}}">Delete</a></td></tr> 
	@endforeach
</table>

<form action="/invoices/add/{{$invoice_id}}" method="POST">
	Qty:<input type="number" name="quantity">
	Item: <select name="item_id">
		@foreach($list as $row)
			<option value="{{$row->id}}">{{$row->name}}</option>
		@endforeach
	</select>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<button>Add Item</button>
</form>

@endsection