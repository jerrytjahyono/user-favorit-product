<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller{


    public function createCategory(Request $nameCategory){
        $category=$nameCategory->validate([
            "name"=>'required'
            ]);
        $category['user_id']=auth()->id();
        Category::create($category);
        return redirect('/');
    }

    public function deleteCategory(Category $category){
        $category->delete();    
        return redirect('/');   
    }

    public function editViewForCategory(Category $category){
        return view('Make View',['category'=>$category]);
    }

    public function editCategory(Category $category, Request $request){
        $data=$request->validate([
            'name'=>'required'
        ]);
        $category->update($data);
        return redirect('/');
    }
  
    public function addProductToCategory(Request $request){
        $data = $request->validate([
            'id'=>'required',
            'category_id'=>'required'
        ]);
        
         try {
             Product::findOrfail($data['id']);
         } catch (ModelNotFoundException $th) {
                 Product::create([
                     'id' => $data['id'],
                 ]); 
         }  

        CategoryProduct::create([
            "product_id"=> $data["id"],
            "category_id"=> $data["category_id"],
        ]);

        return redirect('/product');
    }
    
    public function deleteProductInCategoryProduct(CategoryProduct $categoryProduct){
        $categoryProduct->delete();
        return redirect('/');   
    }
    
}
