@extends('layout')

@section('main_content')

<form action="/customers/add">
	First Name:<input type="text" name="first_name">
	Last Name:<input type="text" name="last_name">
	Email: <input type="email" name="email">
	Gender: <select name="gender">
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>
	<button>Submit</button>
</form>

@endsection