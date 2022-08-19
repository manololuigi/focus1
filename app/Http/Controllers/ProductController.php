<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::paginate(5);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $categorias = Categoria::all();
       $subcategorias = subCategoria::all();
        return view('productos.create', compact('categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sku' => 'required',
            'producto' => 'required',
            'descripcion' => 'required',
            'idcategoria' => 'required',
            'subcategoria' => 'required',
            'cantidad' => 'required',
            'costo_dolares' => 'required',
            'traida_lps' => 'required',
            'venta' => 'required',
            'desc5' => 'required',
            'desc10' => 'required',
            'desc15' => 'required',
            'desc20' => 'required',
            'status' => 'required',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success','Producto creado con éxito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        return view('productos.edit',compact('producto'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $request->validate([
            'sku' => 'required',
            'producto' => 'required',
            'descripcion' => 'required',
            'idcategoria' => 'required',
            'subcategoria' => 'required',
            'cantidad' => 'required',
            'costo_dolares' => 'required',
            'traida_lps' => 'required',
            'venta' => 'required',
            'desc5' => 'required',
            'desc10' => 'required',
            'desc15' => 'required',
            'desc20' => 'required',
            'status' => 'required',
        ]);

        $producto->update($request->all());


        return redirect()->route('productos.index')->with('success','Producto actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();

        return redirect()->route('productos.index')->with('eliminar','ok');;
    }
}
