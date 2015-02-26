<?php namespace App\Http\Controllers;
use DB;
use Request;

class invoiceController extends Controller {

// ===================================================================================
//======================= Select All ==================================
// ===================================================================================

	public function all()
	{
		$results = DB::select(
			"SELECT 
				customer.first_name, 
				customer.last_name,
				invoice.id AS invoice_id,
				invoice_item.item_id,
				SUM(invoice_item.quantity * item.price) AS total
			FROM invoice_item 
			JOIN item ON (invoice_item.item_id = item.id)
			JOIN invoice ON (invoice_item.invoice_id = invoice.id)
			JOIN customer ON (customer.id = invoice.customer_id)
			GROUP BY invoice_id"
			);

		return view('allInvoices', ['results' => $results]);
	}

// ===================================================================================
//====================== Add New Invoice ==================================
// ===================================================================================
	
	public function addNew($id) {
		$sql_values = [':customer_id'=>$id];
		DB::insert(
			"INSERT INTO invoice (`customer_id`, `created_at`)
			VALUES (:customer_id, NOW())",
			$sql_values
		);
		$lastID = DB::getPdo()->lastInsertId();

		return redirect("invoices/details/" . $lastID);
	}

// ===================================================================================
//===================== Add ==================================
// ===================================================================================

	public function add($invoice_id) {
		$quantity = Request::input('quantity');
		$item_id = Request::input('item_id');

		$initSelect = DB::select('SELECT * 
			FROM invoice_item
			WHERE item_id = :item_id
			AND invoice_id = :invoice_id',
			array(
				':item_id' => $item_id,
				':invoice_id' => $invoice_id));

		if ($initSelect) {
			$previousQTY = $initSelect[0]->quantity;
			$sql = DB::update( "UPDATE invoice_item  
					SET quantity= :quantity
					WHERE item_id = :item_id
					AND invoice_id = :invoice_id",
				array(
					':item_id' => $item_id,
					':invoice_id' => $invoice_id,
					':quantity' => ($quantity + $previousQTY)));
		} else {
			echo 'insert new . . . . ';
			$sql = DB::insert(
					'INSERT INTO invoice_item ( `invoice_id`, `item_id`, `quantity`) 
					VALUES ( :invoice_id, :item_id, :quantity)',
				array(
					':invoice_id' => $invoice_id,
					':item_id' => $item_id,
					':quantity' => $quantity));
		}

		return redirect('invoices/details/' . $invoice_id);
	}

// ===================================================================================
//=========================== View Details ==================================
// ===================================================================================

	public function viewDetails($invoice_id) {
		$results = DB::select(
			"SELECT *
			FROM invoice_item 
			JOIN item ON (invoice_item.item_id = item.id)
			WHERE invoice_item.invoice_id = :invoice_id",
			array(
				":invoice_id" => $invoice_id
				)
			);
		$list = DB::select("SELECT * FROM item");

		return view('invoiceDetails', ['results' => $results, 'invoice_id' => $invoice_id, 'list'=>$list]);
	}

// ===================================================================================
//======================== Delete ==================================
// ===================================================================================

	public function delete($invoice_id, $id) {
		DB::select(
			"DELETE FROM invoice_item
			WHERE invoice_item.item_id = :id",
			array(":id" => $id));
		return redirect('invoices/details/' . $invoice_id);
	}
}