<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoCollection;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //retorna los productos si disponible es igual a 1 y los ordena descendente y los pagina
        //return new ProductoCollection(Producto::where('disponible',1)->orderBy('id', 'DESC')->paginate(10));
        //laravel regresa todos los endpoint para ver los datos de forma paginada de varias formas, es genial

       // return new ProductoCollection(Producto::where('disponible',1)->orderBy('id', 'DESC')->get());
        return new ProductoCollection(Producto::orderBy('id', 'ASC')->get());
    } 
        

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->disponible = !$producto->disponible;
        $producto->save();
        return ['producto'=> $producto];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
