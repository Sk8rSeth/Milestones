<?php

Route::get('/', function(){
	return view('home');
});

//customer stuff
Route::get('/customers/all', 'customerController@all');
Route::get('/customers/edit/{id}', 'customerController@edit');
Route::get('/customers/delete/{id}', 'customerController@delete');
Route::get('/customers/addNew/', 'customerController@addIndex');
Route::get('/customers/add/{first_name},{last_name},{email},{gender}', 'customerController@add');

//items stuff
Route::get('/items/all', 'itemController@all');

//invoices stuff
Route::get('/invoices/all', 'invoiceController@all');
Route::get('/invoices/details/{invoice_id}', 'invoiceController@viewDetails');
Route::get('/invoices/addNew/{id}', 'invoiceController@addNew');
Route::get('/invoices/delete/{id},{invoice_id}', 'invoiceController@delete');
Route::post('/invoices/add/{invoice_id}', 'invoiceController@addItem');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);