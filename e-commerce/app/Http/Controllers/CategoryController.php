<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //--Get /api/categories
    public function getCategories(){
        return ["message" => "Getting list of categories"];
    }

    //--Post /api/categories/{categoryId}
    public function createCategory(){
        return ["message" => "Creating 1 new category"];
    }

    //--Get /api/categories/{categoryId}
    public function getCategory($categoryId){
        return ["message" => "Getting 1 ategory base on given categoryId"];
    }

    //--Patch /api/categories/{categoryId}
    public function updateCategory($categoryId){
        return ["message" => "Updating 1 category base on given categoryId"];
    }

    //--Delete /api/categories/{categoryId}
    public function deleteCategory($categoryId){
        return ["message" => "Deleting 1 ategory base on given categoryId"];
    }

    // 🔐 View a task
    public function show(Category $category)
    {
        $this->authorize('view', $category);

        return view('categories.show', compact('category'));
    }

    public function update(Category $category)
    {
    $this->authorize('update', $category);

    // update logic
    }

    // 🔐 Update task status (staff only)
    public function updateStatus(Request $request, Category $category)
    {
        $this->authorize('updateStatus', $category);

        $request->validate([
            'status' => 'required|string'
        ]);

        $category->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status updated');
    }
}
