<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        $category = Category::all();
        return view('category.addCategory', ['category' => $category]);
    }
    public function postaddCategory(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required'
        ]);

        Category::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

    return redirect()->back();

    }

    public function deleteCategory($id){
        Category::where('id', $id)->delete();

        return redirect()->back();
    }

    public function updateCategory($id){
        $auth = Category::where('id', $id)->get();
        $category = Category::all();
        return view('category.updateCategory', [
            'category' => $category,
            'auth' => $auth,
        ]);
    }

    public function postupdateCategory(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
            'id' => 'required',
        ]);

        Category::where('id', $request->id)->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        return redirect('home');
    }
}
