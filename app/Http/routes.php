<?php

//Login
Route::any( 'auth/login', 'LoginController@index' ) ;
Route::get( 'auth/login/logout', 'LoginController@logout' ) ;
Route::post( 'auth/login/onsubmit', 'LoginController@onSubmit' ) ;

Route::any( 'ajax/options/{arg}', 'AjaxController@options' ) ;

Route::controllers([
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::any( 'password_change', 'PasswordChangeController@index' );
Route::any( 'password_change/view/{id}', 'PasswordChangeController@view' );
Route::any( 'password_change/edit/{id}', 'PasswordChangeController@edit' );
Route::post( 'password_change/onEdit/{id}', 'PasswordChangeController@onEdit' );

Route::any('otp', 'OtpController@index') ;
Route::any( 'otp/page', 'OtpController@page' );
Route::any( 'otp/listtable', 'OtpController@otp' );
Route::any( 'otp/add', 'OtpController@add' );
Route::any( 'otp/onAdd', 'OtpController@onAdd' );
Route::post( 'otp/onVerifyOtp', 'OtpController@onVerifyOtp' );

Route::any('person', 'PersonController@index') ;
Route::any( 'person/page', 'PersonController@page' );
Route::any( 'person/listtable', 'PersonController@otp' );
Route::any( 'person/add/', 'PersonController@add' );
Route::any( 'person/edit/{id}', 'PersonController@edit' );
Route::any( 'person/adminedit/{id}', 'PersonController@adminedit' );
	Route::any( 'person/adminview/{id}', 'PersonController@adminview' );

Route::any( 'person/onAdd/{id?}', 'PersonController@onAdd' );
Route::post( 'person/onVerifyOtp', 'PersonController@onVerifyOtp' );

Route::get('/member', 'OtpController@index') ;

//Route::get('person', 'PersonController@index') ;

Route::any( 'details', 'DetailsController@index' );
Route::any( 'details/page', 'DetailsController@page' );
Route::any( 'details/listtable', 'DetailsController@listtable' );
Route::any( 'details/add', 'DetailsController@add' );
Route::post( 'details/onAdd', 'DetailsController@onAdd' );


Route::get('/', 'HomeController@index') ;
Route::post('/send', 'HomeController@send') ;

Route::get('payment', 'PaymentController@index');

Route::any( 'admin', 'MemberController@index' );
Route::any( 'member', 'MemberController@index' );
Route::any( 'member?attachment_file={notification}', 'MemberController@index' );
Route::any( 'member/page', 'MemberController@page' );
Route::any( 'member/listtable', 'MemberController@listtable' );
Route::any( 'member/listprint', 'MemberController@listprint' );
Route::any( 'member/listword', 'MemberController@listword' );
Route::any( 'member/listcsv', 'MemberController@listcsv' );
Route::any( 'member/acknowledge', 'MemberController@acknowledge' );
Route::any( 'member/acknowledge/{id}', 'MemberController@acknowledge' );
Route::post( 'member/onAcknowledge/{id}', 'MemberController@onAcknowledge' );
Route::any( 'member/add/{id}', 'MemberController@add' );
Route::any( 'member/filter', 'MemberController@filter' );
Route::post( 'member/onAdd/{id}', 'MemberController@onAdd' );

Route::post( 'payment/onGo', 'PaymentController@onGo' ) ;
Route::any( 'payment/redirect', 'PaymentController@redirect' ) ;
Route::any( 'payment/cancel', 'PaymentController@cancel' ) ;

Route::any( 'payment/receipt/{id}', 'PaymentController@receipt' ) ;

Route::get('password', 'PasswordController@index');

Route::get('success', 'SuccessController@index');

Route::get('admins', 'AdminController@index');

Route::get('failed', 'FailedController@index');

/* Print Controller Start */
Route::get( 'listprint/{action}/print_list', "PrintController@printList" );
Route::get( 'print/printaction/{controller}/{action}/{args?}', "PrintController@printAction" );
Route::get( 'listexcel/{action}/print_list', "ExcelController@printList" );
Route::get( 'listword/{action}/print_word', "WordController@printWord" );
/* Print Controller End */

Route::any( 'terms_and_conditions', 'TermsAndConditionsController@index' );
Route::any( 'privacy_policy', 'PrivacyPolicyController@index' );
Route::any( 'price_details_refunds', 'PriceDetailsRefundsController@index' );
