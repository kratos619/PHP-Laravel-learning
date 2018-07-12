<?php
use App\User;
use App\Role;
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
//create data base
Route::get('/insert', function () {
    $user = User::find(1);
    $role = new Role(['name'=>' Administrator']);
    $user->role()->save($role);
    return view('welcome');
});
//Read data base
Route::get('/read', function () {
    $user = User::findOrFail(1);
//dd($user);
    foreach($user->role as $role){
        echo $role->name;
    }
});
//Update data base
Route::get('/update', function () {
    $user = User::findOrFail(1);
if($user-> has('role')){
    foreach($user->role as $role){
            $role->name = 'admin';
            $role->save();
    }
}
});
//Delete data base
Route::get('/delete', function () {
    $user = User::find(1);

    foreach($user->role as $role){
            $role->whereId(1)->delete();
    }

});