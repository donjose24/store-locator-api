<?php

namespace App\Http\Controllers\Api;

use Log;
use Validator;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    
    public function all(Request $request)
    {
        if ($request->get('format') == "json") {
            return response()->json($this->product->all());
        } else {
            return response()->json($this->product->all())->setCallback($request->get('callback'));
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        if ($request->get('format') == "json") {
            return response()->json($this->product->search($query));
        } else {
            return response()->json($this->product->search($query))->setCallback($request->get('callback'));
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'dosage' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category = $request->get('category');
        $product->dosage = $request->get('dosage');
        $product->save();

        $request->session()->flash('message', 'Medicine successfuly added');
        return redirect()->back();
    }

    public function edit($id)
    {
        $medicine = Product::findOrFail($id);
        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $product = Product::findOrFail($id);

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category = $request->get('category');
        $product->dosage = $request->get('dosage');
        $product->save();

        $request->session()->flash('message', 'Medicine successfuly updated');
        return redirect('/medicines');
 
    }

    public function destroy($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $request->session()->flash('message', 'Medicine successfuly deleted');

        return redirect()->back();
    }
}
