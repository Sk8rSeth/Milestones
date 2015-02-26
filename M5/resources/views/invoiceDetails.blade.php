@extends('layout')

@section('main_content')

<table border=1> <tr><th>Qty.</th><th>Name</th><th>Price</th><th>Subtotal</th></tr>
	@foreach($results as $row) 
		 <tr><td>{{$row->quantity}}</td>
		 <td>{{$row->name}}</td>
		 <td>{{$row->price}}</td>
		 <td>{{$row->price * $row->quantity}}</td>
		 <td><a href="/invoices/delete/{{$row->invoice_id}}">Delete</a></td></tr> 
	@endforeach
</table>

** doesnt yet work **
<form action="/invoices/edit">
	Qty:<input type="number">
	Item: <select name="item" id="">
		@foreach($results as $row)
			<option>{{$row->name}}</option>
		@endforeach
	</select>
	<button>Add Item</button>
</form>

@endsection