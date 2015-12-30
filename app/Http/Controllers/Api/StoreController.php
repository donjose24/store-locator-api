<?php

namespace App\Http\Controllers\Api;

use App\Store;
use App\Http\Controllers\Controller;
use App\Contracts\StoreService;

class StoreController extends Controller 
{
    public function __construct(StoreService $store) {
        $this->store = $store;
    }
    public function all() {
        return $this->store->all()->toJson();
    }

    public function show($id) {
        return $this->store->find($id)->toJson();
    }
}

