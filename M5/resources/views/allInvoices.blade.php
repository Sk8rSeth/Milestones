@extends('layout')

@section('main_content')
<table border=1> <tr><th>Name</th><th></th></tr>
	@foreach($results as $row) 
		 <tr><td>{{$row->first_name}} {{$row->last_name}}</td>
		 <td>{{$row->total}}</td>
		 <td><a href="/invoices/details/{{$row->invoice_id}}">Edit</a></td>
		 <td><a href="/invoices/delete/{{$row->invoice_id}}">Delete</a></td></tr> 
	@endforeach
</table>

@endsection