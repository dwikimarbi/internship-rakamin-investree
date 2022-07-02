<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function addArticle(){

        $category = Category::all();
        return view('article.addArticle', ['category' => $category]);
    }

    public function postaddArticle(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' =>  'required | file | image | mimes:jpeg,png,jpg | max:2048',
            'category_id' => 'required',
            'user_id' => 'required'
        ]);

        $image = $request->file('image');
      

        $name_image = time() . "_" . rand(10, 50) . $image->getClientOriginalName();
        $image_location = "image";
        $image->move($image_location , $name_image);

            Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $name_image,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
        
      
        return redirect('home');
    }


    public function updateArticle($id){
        $category = Category::all();
        $articles = Article::where('id', $id)->get();

        return view('article.updateArticle', [
            'articles' => $articles,
            'category'=> $category,
        ]);
    }

    public function postupdateArticle(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' =>  'file | image | mimes:jpeg,png,jpg | max:2048',
            'category_id' => 'required',
            'user_id' => 'required'
        ]);

       
        if(!isset($request->image)){
            Article::where('id', $request->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);

            return redirect('home');
        }else{
            $image = $request->file('image');
      

            $name_image = time() . "_" . rand(10, 50) . $image->getClientOriginalName();
            $image_location = "image";
            $image->move($image_location , $name_image);

            Article::where('id', $request->id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $name_image,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
            ]);
            return redirect('home');
        }
    }

    public function deleteArticle($id){
        Article::where('id', $id)->delete();
        return redirect('home');
    }

    public function viewArticle($id){
        $articles = Article::where('id', $id)->get();
        return view('article.viewArticle', ['articles' => $articles]);
    }

}
