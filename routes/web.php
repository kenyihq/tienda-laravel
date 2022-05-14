<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', function() {
    $products = Product::all();
    return view('products.index', compact('products'));
})-> name('products.index');

Route::get('products/create', function() {
    return view('products.create');
})->name('products.create');

Route::post('products', function(Request $request) {   
    $newProduct = new Product();
    $newProduct->description = $request->description;
    $newProduct->price = $request->price;
    $newProduct->save();
    return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    
})->name('products.store');