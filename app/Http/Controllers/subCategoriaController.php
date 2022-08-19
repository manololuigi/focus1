<?php

namespace App\Http\Controllers;

use App\Models\subCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class subCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcategorias = subCategoria::paginate(5);
        return view('subcategorias.index',compact('subcategorias'));

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
        return view('subcategorias.create', compact('categorias'));
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
         'descripcion' => 'required',
        ]);

        subCategoria::create($request->all());

        return redirect()->route('subcategorias.index')->with('success','Subcategoria creada con éxito.');

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
    public function edit(subCategoria $subcategoria)
    {
        //
        $categorias = Categoria::all();
        return view('subcategorias.edit',compact('subcategoria', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subCategoria $subcategoria)
    {
        //
        $request->validate([

            'descripcion' => 'required',
        ]);

        $subcategoria->update($request->all());


        return redirect()->route('subcategorias.index')->with('success','Subcategoria actualizada con éxito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(subCategoria $subcategoria)
    {
        //
        $subcategoria->delete();

        return redirect()->route('subcategorias.index')->with('eliminar', 'ok');;
    }
}
