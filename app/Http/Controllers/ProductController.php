<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $product = Product::create([
            'name' => $request->input('name')
        ]);
        ProductCreated::dispatch($product);

        return response()->json($product);
    }
}
