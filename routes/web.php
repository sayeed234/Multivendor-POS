<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Lang/{locale}', function ($locale) {
    session()->put('locale',$locale);
    return redirect()->back();
});

Route::get('/login','admin\adminController@login');
Route::post('/login','admin\adminController@adminlogin');
Route::get('/logout','admin\adminController@logout');


//...........................Admin...........................................
Route::get('/dashboard','admin\adminController@admin');

//user
Route::get('/user','admin\adminController@user');
Route::post('/user/store','admin\adminController@user_store');
Route::get('/user/edit/{id}','admin\adminController@user_edit');
Route::post('/user/update','admin\adminController@user_update');
Route::get('/user/delete/{id}','admin\adminController@user_delete');





//.............................User..........................................
//profile.......................
Route::get('/mydashboard','user\UserController@user');
Route::get('/profile','user\UserController@profile');
Route::get('/profile/edit/{id}','user\UserController@profile_edit');
Route::post('/profile/update','user\UserController@profile_update');
Route::post('/password/update','user\UserController@password');

//employee.......................
Route::get('/employee','user\EmployeeController@employee');
Route::post('/employee/store','user\EmployeeController@employee_store');
Route::get('/employee/edit/{id}','user\EmployeeController@employee_edit');
Route::post('/employee/update','user\EmployeeController@employee_update');
Route::get('/emicustomer','user\EmployeeController@emicustomer');

//employe salary..................
Route::get('/employee_salary','user\EmployeeController@employee_salary');
Route::post('/employee_salary/store','user\EmployeeController@employee_salary_store');
Route::get('/employee_salary/edit/{id}','user\EmployeeController@employee_salary_edit');
Route::post('/employee_salary/update','user\EmployeeController@employee_salary_update');
Route::get('/employee_salary/delete/{id}','user\EmployeeController@employee_salary_delete');

//Band.........................
Route::get('/product_band','user\ProductController@product_band');
Route::post('/product_band/store','user\ProductController@product_band_store');
Route::get('/product_band/edit/{id}','user\ProductController@product_band_edit');
Route::post('/product_band/update','user\ProductController@product_band_update');
Route::get('/product_band/delete/{id}','user\ProductController@product_band_delete');

//product.......................
Route::get('/product','user\ProductController@product');
Route::post('/product/store','user\ProductController@product_store');
Route::get('/product/edit/{id}','user\ProductController@product_edit');
Route::post('/product/update','user\ProductController@product_update');
Route::get('/product/delete/{id}','user\ProductController@product_delete');

//Stock.......................
Route::get('/stock','user\StockController@stock');
Route::get('/newstock','user\StockController@newstock');
Route::post('/newstock/store','user\StockController@newstock_store');
Route::get('/newstock/edit/{id}','user\StockController@newstock_edit');
Route::post('/newstock/update','user\StockController@newstock_update');

//Sale-----------------------------
Route::get('/product_view/{id}','user\SaleController@view');
Route::post('/addtocart','user\SaleController@addtocart')->name('cart');
Route::get('/cartshow','user\SaleController@cartshow');
Route::get('/deletecart/{id}','user\SaleController@cartshow_delete');
Route::get('/cartupdate','user\SaleController@cartshow_update');

//Order............................
Route::post('/sale','user\SaleController@sale')->name('sale');
Route::get('/sale/invoice','user\SaleController@invoice');

//Payment.............................
Route::get('/pending_payment','user\PaymentController@sale_pending');
Route::get('/success_sale','user\PaymentController@success_sale');
Route::get('/pending_payment/payment/{id}','user\PaymentController@payment');
Route::get('/payment_history','user\PaymentController@payment_history');
Route::post('/payment','user\PaymentController@payment_store');
Route::get('/payment/view/{id}','user\PaymentController@payment_view');

//Expense..........................

Route::get('/purchase','user\ExpenseController@purchase');
Route::post('/purchase/store','user\ExpenseController@purchase_sotre');
Route::get('/purchase/{id}','user\ExpenseController@purchase_edit');
Route::post('/purchase/update','user\ExpenseController@purchase_update');
Route::get('/purchase/delete/{id}','user\ExpenseController@purchase_delete');
//daily Expense...........................
Route::get('/daily_expense','user\ExpenseController@daily_expense');
Route::post('/daily_expense/store','user\ExpenseController@daily_store');
Route::get('/daily_expense/{id}','user\ExpenseController@daily_edit');
Route::post('/daily_expense/update','user\ExpenseController@daily_update');
Route::get('/daily_expense/delete/{id}','user\ExpenseController@daily_delete');

//Report............................................................................
Route::get('/product_sale_report','user\ReportController@product_sale_report');
Route::get('/sale_report','user\ReportController@sale_report');
Route::get('/due_pay_report','user\ReportController@due_pay_report');
Route::get('/expense_report','user\ReportController@expense_report');
