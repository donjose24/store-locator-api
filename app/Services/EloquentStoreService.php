<?php

namespace App\Services;

use App\Store;
use App\Contracts\StoreService;

class EloquentStoreService implements StoreService 
{

    public function all()
    {
        return Store::with('products')->get();
    }

    public function find($id)
    {
        return Store::findOrFail($id)->with('products')->get();
    }
}
