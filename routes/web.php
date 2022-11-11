<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Product;  // Lo importamos de Models
// use Illuminate\Support\Facades\Auth;



// Route::middleware('auth')->group(function () {
    Route::get('products', function () {
        // $products = Product::all(); //Guardamos en una variable todo el listado de productos que vamos creando en la base de datos
        $products = Product::orderBy('created_at', 'desc')->get();  // Con esta línea estamos ordenando los productos en orden descendente a partir de la columna created_at
        return view('products.index', compact('products')); // Pasamos como segundo parámetro la variable con la lista de todos los productos
    })->name('products.index');

    Route::get('products/create', function () {
        return view('products.create');
    })->name('products.create')->middleware('auth');

    Route::post('products', function (Request $request) {
        //Creamos una variable que va a ser igual a una nueva instancia del modelo Product
        $newProduct = new Product;
        // Vamos a llenar uno por uno los campos que quiero agregar a la base de datos:
        $newProduct->description = $request->input('description'); // Con input('description') estamos capturando el valor de lo ingresado en el formulario
        // ☝🏼 En nuestra tabla tenemos un campo llamado description que va a ser igual a lo que se ingrese en el formulario en la parte de description
        $newProduct->price = $request->input('price');
        // Por ahora no nos guarda los datos, sólo estamos asignando valores (a donde va a ir cada uno)
        $newProduct->save(); // Con esto ya nos guarda el producto creado
        return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
    })->name('products.store');

    Route::delete('products/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info', "Producto eliminado exitosamente");
    })->name('products.destroy');
    // Para llamar a la ruta delete hace falta un formulario

    Route::get('products/{id}/edit', function ($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    })->name('products.edit');

    Route::put('products/{id}', function (Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info', "Producto '{$request->input('description')}' modificado exitosamente");
        // return $request->all();
    })->name('products.update');
// });

Route::get('login', function(){
    return view('auth.login');
})->name('login');





// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
