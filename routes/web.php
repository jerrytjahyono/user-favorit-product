<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/laravel',function(){
    return view('welcome');
});

Route::get('/',function(){
    $categories = auth()->user()->userCategories()->get();
    $view = "TODO: CREATE VIEW";
    return view($view,["categories"=>$categories]);
});

route::post("/category",[CategoryController::class,'createCategory']);
route::delete("/category/{categoryId}",[CategoryController::class,'deleteCategory']);
route::get('/category/{category}/update',[CategoryController::class,'editVieForCategory']);
route::put('/category/{category}/update',[CategoryController::class,'editCategory']);
