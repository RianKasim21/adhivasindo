<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

         return response()->json($products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->messages(),
            ], 422);
        }
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Product Created Success',
            'data' => new ProductResource($product),
        ], 200);
    }

    public function show(Product $product) {
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'error' => $validator->messages(),
            ], 422);
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Product Update Success',
            'data' => new ProductResource($product),
        ], 200);
    }

    public function destroy(Product $product) {
        $product->delete();
        return response()->json([
            'message' => 'Product Deleted Success',
        ], 200);
    }
}
