<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use Carbon\Carbon;
use PDF;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class OtroEnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required',
            'dir_1' => 'required',
            'dir_2' => 'required',
            'email' => 'required',
            'identidad' => 'required',
            /* 'rtn' => 'required',
            'ct_alterno' => 'required', */
            'observaciones' => 'required',
            'products' => 'required'

        ]);


        Envio::create($request->all()+[
            'fecha_venta'=>Carbon::now('America/Tegucigalpa'),
        ]);

        $details=[

            'title' => 'Focus Store Nuevo Envio',
            'body' => 'Nuevo Envio ingresado',

        ];
/*
 */     Mail::to('dlproject995@gmail.com')->send(new TestMail($details));

        return redirect('/inicio');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
