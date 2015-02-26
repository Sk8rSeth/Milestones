<?php 

namespace App\Models;
use DB;

class Invoice {
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

	public function addNew() {
		DB::select(
			"INSERT INTO invoice (`customer_id`)
			VALUES (:customer_id)",
			array(':customer_id' => $id)
		);
		$newID = DB::getPdo()->lastInsertId();﻿

		return redirect("invoices/details/$newID");
	}
	
	public function add() {

	}

	public function viewDetails($invoice_id) {
		$results = DB::select(
			"SELECT *
			FROM invoice_item 
			JOIN item ON (invoice_item.item_id = item.id)
			WHERE invoice_item.invoice_id = :invoice_id",
			array(":invoice_id" => $invoice_id)
		);

		return view('invoiceDetails', ['results' => $results, 'invoice_id' => $invoice_id]);
	}

	public function edit($id) {

	}

	public function delete($id) {
		DB::select(
			"DELETE FROM invoice WHERE id = :id",
			array(":id"=>$id)
			);

		return redirect('invoices/all');
	}
}