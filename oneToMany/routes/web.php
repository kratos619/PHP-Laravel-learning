<?php
use App\User;
use App\Post;
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
echo "<h2>hi</h2>";
//return view('welcome');
});
Route::get('/hi', function () {
echo "<h2>hi2</h2>";
//return view('welcome');
});

// insert Data
Route::get('/create', function(){
  $user = User::findOrFail(1);
  $post = new Post(['title'=>'first post title','body'=>'this is content one']);
if($user->posts()->save($post)){
echo "data insert Successfull";
}
});

// read data
Route::get('/users', function () {
    $user = User::findOrFail(1);
    return $user->posts;
});

// update data
Route::get('/update', function(){ 
  $user = User::find(1);
  $post = $user->posts()->whereId(1)->update(['title'=>'update first post title','body'=>'update this is content one']);
if($post){
echo "data update Successfull";
}
});
// delete data
Route::get('/update', function(){ 
  $user = User::find(1);
  $post = $user->posts()->whereId(1)->delete();
if($post){
echo "data delete Successfull";
}
});
