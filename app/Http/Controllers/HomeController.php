<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Store;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function stores()
    {
        $stores = Store::all();
        return view('stores', compact('stores'));
    }

    public function medicines()
    {
        $medicines = Product::all();
        return view('medicines', compact('medicines'));
    }

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
    }

    return 'ok';
}
