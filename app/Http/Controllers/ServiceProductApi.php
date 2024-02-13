<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use Illuminate\Http\Request;

class ServiceProductApi extends Controller
{
    public function index(){
        $products = ServiceProduct::all();
        return response()->json($products);
    }

    public function show($id){
    $product = ServiceProduct::findOrFail($id);
    return response()->json($product);
    }

    public function store(Request $request){
    $this->validate($request, [
        'name' => 'required|string',
        'type' => 'required|in:service,product',
        'price' => 'required|numeric|min:0',
        'company_id' => 'required|exists:companies,id',
    ]);

    $product = ServiceProduct::create($request->all());

    return response()->json($product, 201);
    }

    public function update(Request $request, $id){
    $product = ServiceProduct::findOrFail($id);

    $this->validate($request, [
        'name' => 'string|max:255',
        'type' => 'in:service,product',
        'price' => 'numeric|min:0',
        'company_id' => 'exists:companies,id',
    ]);

    $product->update($request->all());

    return response()->json($product);
    }

    public function destroy($id){
    $product = ServiceProduct::findOrFail($id);
    $product->delete();

    return response()->json(null, 204); // No content
    }
}
