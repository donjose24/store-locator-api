<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductService;

class ApiController extends Controller
{

    public function analytics(Request $request)
    {
        $model = $request->get('model');
        $id = $request->get('id');

        if ($model == "product") {
            $product = Product::find($id);

            $views = $product->views;
            $product->views = $views + 1;
            $product->save();
        } else {
            $store = Store::find($id);

            $views = $store->views;
            $store->views = $views + 1;
            $store->save();
        }

        return 'ok';
    }
}
