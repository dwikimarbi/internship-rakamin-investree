<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $categories = auth()->user()->category()->get();
            return $this->success($categories, "Success fetch data");
        } catch (\Exception $e) {

            return $this->error("Error fetch data", $e->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = auth()->user();
            $response = $user
                ->category()
                ->create($request->all());

            return $this->success($response, "Success submit data");
        } catch (\Exception $e) {

            return $this->error("Error submit data", $e->getMessage());
        }
    }

    public function update(CategoryRequest $request, Category $category): \Illuminate\Http\JsonResponse
    {
        try {
            $category->update($request->all());

            return $this->success($category, "Success update data");
        } catch (\Exception $e) {

            return $this->error("Error update data", $e->getMessage());
        }
    }

    public function destroy(Category $category): \Illuminate\Http\JsonResponse
    {
        try {
            $category->delete();

            return $this->success([], "Success delete data");
        } catch (\Exception $e) {

            return $this->error("Error delete data", $e->getMessage());
        }
    }
}
