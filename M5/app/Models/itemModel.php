<?php namespace App\Models\;

use DB;
class Items {

	public static function getAll()
	{
		$results = DB::select('select * from item');

		return $results;
	}

	public function add() {

	}

	public function delete() {

	}

}