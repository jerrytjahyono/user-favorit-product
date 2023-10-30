<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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

route::get('/category/{id}', function(string $id){
    $category = Category::find($id);
    $categoryProducts=$category->categoryProducts()->get();
    return view('TODO',['products'=>$categoryProducts]);
});

route::post("/category",[CategoryController::class,'createCategory']);
route::delete('/category/{id}',[CategoryController::class,'deleteCategory']);
route::get('/category/{id}/update',[CategoryController::class,'editVieForCategory']);
route::put('/category/{id}/update',[CategoryController::class,'editCategory']);
route::delete('/category-product/{id}',[CategoryController::class,'deleteProductInCategoryProduct']);
route::post('/category-product', [CategoryController::class,'addProductToCategory']);

route::post('/login',[UserController::class,'login']);
route::post('/register',[UserController::class,'register']);
route::post('/logout',[UserController::class,'logout']);
