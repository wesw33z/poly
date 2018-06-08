<?php
use App\Staff;
use App\Product;
use App\Photo;
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

Route::get('/', function () {
    return view('welcome');
});

//CRUD - Create a record image in the DB
Route::get('/create', function(){
    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['path'=>'example.jpg']);
});
//CRUD - Read data from the DB
Route::get('/read', function(){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo){
        return $photo->path;
    }
});

//CRUD - Update record in DB
Route::get('/update', function(){
   $staff = Staff::findOrFail(1);
   $photo = $staff->photos()->whereId(1)->first();
   $photo->path = "Update example.jpg";
   $photo->save();
});

//CRUD - Delete record form DB
Route::get('/delete', function(){
    $staff = Staff::findOrFail(2);
    $staff->photos()->whereId(2)->delete();
});
//CRUD - Updating a record a different way
Route::get('/assign', function(){
   $staff = Staff::findOrFail(1);
   $photo = Photo::findOrFail(4);
   $staff->photos()->save($photo);
});

//CRUD -





