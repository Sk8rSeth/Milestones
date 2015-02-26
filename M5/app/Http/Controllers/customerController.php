<?php namespace App\Http\Controllers;
use DB;
class customerController extends Controller {

	public function all()
	{
		$results = DB::select('select * from customer');

		return view('allCustomers', ['results' => $results]);
	}

	public function addIndex(){
		return view('addCustomer');
	}

	public function add($first_name, $last_name, $email, $gender) {
		DB::select(
			"INSERT INTO customer (`first_name`, `last_name`, `email`, `gender`) 
				VALUES(:first_name, :last_name, :email, :gender)",
			array(
				":first_name"=>$first_name,
				':last_name'=>$last_name,
				':email'=> $email,
				':gender'=> $gender
			)
		);

		return redirect('customers/all');
	}

	public function delete($id) {
		DB::select(
			"DELETE FROM customer WHERE id = :id",
			array(":id"=>$id)
			);

		return redirect('customers/all');
	}

	public function edit($id){

		return view();
	}

	// public function add(){

	// 	return view();
	// }

}
