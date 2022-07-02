<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getArticle(Article $Article)
    {
        try {
            return $this->success($Article, "Success get data");
        } catch (\Exception $e) {

            return $this->error("Error get data", $e->getMessage(), 404);
        }
    }

    public function getArticles()
    {
        try {

            return $this->success(Article::paginate(10), "Success get data");
        } catch (\Exception $e) {

            return $this->error("Error get data", $e->getMessage(), 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ArticleRequest $request)
    {
        try {
            $Article = new Article();

            $Article->fill([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'image' => $request->image,
            ]);

            $Article->saveOrFail();

            return $this->success($Article, "Success for submit data");
        } catch (\Exception $e) {

            return $this->error("Error for submit data", $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $Article)
    {
        try {
            $Article->fill($request->all());

            $Article->saveOrFail();

            return $this->success($Article, "Success, data updated.");
        } catch (\Exception $e) {

            return $this->error("Error updated data", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        try {
            $Article->delete();

            return $this->success([], "Success, data deleted.");
        } catch (\Exception $e) {

            return $this->error("Error, deleted data", $e->getMessage());
        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        //
    }
}
