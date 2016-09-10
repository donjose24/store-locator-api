<?php

namespace App\Http\Controllers\Api;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\StoreService;

class StoreController extends Controller
{
    public function __construct(StoreService $store)
    {
        $this->store = $store;
    }

    public function all(Request $request)
    {
        if ($request->get('format') == "json") {
            return response()->json($this->store->all());
        } else {
            return response()->json($this->store->all())->setCallback($request->get('callback'));
        }
    }

    public function show($id, Request $request)
    {
        if ($request->get('format') == "json") {
            return response()->json($this->store->find($id));
        } else {
            return response()->json($this->store->find($id))->setCallback($request->get('callback'));
        }
    }

    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->get('name');
        $store->address = $request->get('address');
        $store->lat = $request->get('lat');
        $store->long = $request->get('long');
        $store->url = "blaaah";

        $store->save();

        return redirect()->back();
    }
}
