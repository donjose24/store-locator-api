<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductService $product) {
        $this->product = $product;
    }

    public function all(Request $request) {
        if($request->get('format') == "json") 
            return response()->json($this->product->all()->toJson());
        else
            return response()->json($this->product->all()->toJson())->setCallback($request->get('callback'));
    }

    public function search(Request $request) {
        $query = $request->get('query');

        if($request->get('format') == "json") 
            return response()->json($this->product->search($query)->toJson());
        else
            return response()->json($this->product->search($query)->toJson())->setCallback($request->get('callback'));
    }
}

