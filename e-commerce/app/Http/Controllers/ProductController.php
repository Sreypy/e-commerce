<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // 🔐 Gate authorization
        Gate::authorize('products.create');

        // ✅ Validation (adjust fields to your table)
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // ✅ Create product
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
     
}
