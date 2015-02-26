@extends('layout')

@section('main_content')
<table border=1> <tr><th>Name</th><th></th></tr>
	@foreach($results as $row) 
		 <tr><td>{{$row->first_name}} {{$row->last_name}}</td>
		 <td><a href="/invoices/addNew/{{$row->id}}">New Invoice</a></td>
		 <td><a href="/customers/edit/{{$row->id}}">Edit</a></td>
		 <td><a href="/customers/delete/{{$row->id}}">Delete</a></td></tr> 
	@endforeach
</table>
<h3><a href="/customers/addNew">Add New Customer</a></h3>

@endsection


