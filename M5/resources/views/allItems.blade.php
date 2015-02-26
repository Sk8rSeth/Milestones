@extends('layout')

@section('main_content')
	{{-- ** list of all items ** --}}
	{{-- {{$results}} --}}
<table border=1> <tr><th>Item Name</th><th>Price</th></tr>
	@foreach($results as $row) 
		<tr><td>{{$row->name}}</td><td>{{$row->price}}</td><td></tr>
	@endforeach
</table>
@endsection

