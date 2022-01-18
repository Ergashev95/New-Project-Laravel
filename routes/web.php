<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
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
Route::get('test',function(){
    $category = Category::get();
    $name = "Abdulla";
    $prof = "Web parogramist";
    // array
    // compact
    // with
    return view('test',['categories' => $category]);
    // return view('test',with(['name' => $name , 'prof' => $prof]));
    // return view('test',compact('name','prof'));

});

Route::get('products', [App\Http\Controllers\ProductController::class,'index'])->name('product.index');
Route::get('product/create',[App\Http\Controllers\ProductController::class,'create'])->name('product.create');
Route::post('products/store',[App\Http\Controllers\ProductController::class,'store'])->name('product.store');
Route::get('products/show{id}',[App\Http\Controllers\ProductController::class,'show'])->name('product.show');
Route::get('products/edit{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
Route::put('products/update{id}',[App\Http\Controllers\ProductController::class,'update'])->name('product.update');
Route::delete('products/delete{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('product.delete');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
