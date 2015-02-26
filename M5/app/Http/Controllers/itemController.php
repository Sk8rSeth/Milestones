<?php namespace App\Http\Controllers;
use DB;
class itemController extends Controller {

	public function all()
	{
		$results = DB::select('select * from item');

		return view('allItems', ['results' => $results]);
	}

	public function add() {

	}

	public function delete() {

	}

}