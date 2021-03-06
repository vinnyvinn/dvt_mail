<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("send-mail",function (\Illuminate\Http\Request $request){
    $cc = '';
    if (isset($request->cc) && $request->cc !==''){
        $cc = json_decode($request->cc);
    }
    info($request->all());
    \Mail::to($request->to)->cc($cc)->send(new App\Mail\SendMail($request->subject,$request->message));
   return response('Mail sent!');
});
