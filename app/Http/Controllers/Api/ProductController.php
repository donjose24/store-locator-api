<?php

namespace App\Http\Controllers\Api;

use Log;
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
            return response()->json($this->product->all());
        else
            return response()->json($this->product->all())->setCallback($request->get('callback'));
    }

    public function search(Request $request) {
        $query = $request->get('query');

        if($request->get('format') == "json") 
            return response()->json($this->product->search($query));
        else
            return response()->json($this->product->search($query))->setCallback($request->get('callback'));
    }
}

