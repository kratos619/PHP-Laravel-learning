<?php
use App\User;
use App\Address;
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
   // return view('welcome');
    echo "<h1>HI there</h1>";
});
//insert data

Route::get('/insert', function () {
   $user = User::findOrFail(1);
   $address = new Address(['name'=>'gopal nagar paratwada']);
   $user->address()->save($address);

});

//update data 
Route::get('/update', function () {
   $address = Address::whereUserId(1)->first();
   $address ->name='update gopal nagar paratwada';
   $address->save();
});

//\Read data 
Route::get('/read', function () {
   $user = User::findOrFail(1);
   echo  $user->address->name;
});
//\delete data 
Route::get('/delete', function () {
   $user = User::findOrFail(1);
   if($user->address()->delete()){
 echo "Seccessfully delete";
   }
    
});