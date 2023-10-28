<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

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

}
