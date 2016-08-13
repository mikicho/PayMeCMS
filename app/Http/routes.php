<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('dashboard');
});

Route::post('/customers/create', function (Request $request) {
    //Some validations... 

    $email = DB::connection()->getPdo()->quote($request->input('email'));
    $password = md5("salt".$request->input('confirmPassword'));
    $creditCard = DB::connection()->getPdo()->quote($request->input('creditCard'));

    try {
        if(DB::insert('INSERT INTO users (email, password, credit) values (?, ?, ?)', [$email, $password, $creditCard]) === TRUE){
            return "Customer {$email} Created";
        }
    } catch(PDOException $e){
            return $e->getMessage();
    }
});

Route::delete('/customers/{id}', function ($id) {
    try {
        if(DB::insert('DELETE FROM users WHERE id=?', [$id]) === TRUE){
            return "Success";
        }
    } catch(PDOException $e){
            return $e->getMessage();
    }
});

Route::get('/customers/edit/{id}', function ($id) {
    return view('editCustomer', ["id"=>$id]);
});

Route::get('/customers/edit/post/{id}', function ($id,Request $request) {
    //some validations...
    $email = $request->input('email');
    $password = $request->input('confirmPassword');
    $creditCard = $request->input('creditCard');

    if(!empty($email)){
        $email = DB::connection()->getPdo()->quote($request->input('email'));
        try {
            DB::insert('UPDATE users SET email=? WHERE id=?', [$email, $id]);
        } catch(PDOException $e){
                return $e->getMessage();
        }
    }

    if(!empty($password)){
        $password = md5("salt".$request->input('confirmPassword'));
        try {
            DB::insert('UPDATE users SET password=? WHERE id=?', [$password, $id]);
        } catch(PDOException $e){
                return $e->getMessage();
        }
    }

    if(!empty($creditCard)){
        $creditCard = DB::connection()->getPdo()->quote($request->input('creditCard'));
        try {
            DB::insert('UPDATE users SET credit=? WHERE id=?', [$creditCard, $id]);
        } catch(PDOException $e){
                return $e->getMessage();
        }
    }

    return "success";
});

Route::get('/customers/list', function () {
    try {
        if($users = DB::select('select * from users')){
            return view('customersList', ['users' => $users]);
        }
    } catch(PDOException $e){
            return $e->getMessage();
    }
});
