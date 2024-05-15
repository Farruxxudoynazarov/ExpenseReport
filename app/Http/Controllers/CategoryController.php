<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('auth:sanctum'); // Faqat tizimga kirgan foydalanuvchilarni cheklash uchun
     }

    public function index()
    {

     $categories = Category::all();
     return response()->json($categories);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'icon' => 'nullable|string',
        //     'type' => 'required|in:income, expense'
        // ]);
        
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }



    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
{
    $category = Category::findOrFail($id);
    $category->update($request->validated());
    return response()->json($category);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Category deleted']);
    }
}
