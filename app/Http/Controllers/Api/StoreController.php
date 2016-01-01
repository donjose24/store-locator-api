<?php

namespace App\Http\Controllers\Api;

use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\StoreService;

class StoreController extends Controller 
{
    public function __construct(StoreService $store) {
        $this->store = $store;
    }

    public function all(Request $request) {
        if($request->get('format') == "json")
            return response()->json($this->store->all()->toJson());
        else
            return response()->json($this->store->all())->setCallback($request->get('callback'));
    }

    public function show($id, Request $request) {
        if($request->get('format') == "json")
            return response()->json($this->store->find($id)->toJson());
        else
            return response()->json($this->store->find($id))->setCallback($request->get('callback'));
    }

}

