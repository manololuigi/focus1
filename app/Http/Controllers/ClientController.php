<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Envio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::paginate(5);
        return view('clients.index',compact('clients'));
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
            'rtn' => 'required',
            'ct_alterno' => 'required',
            'observaciones' => 'required',
            'products' => 'required'
            /* 'ct_alterno' => 'required',  */

        ]);

        Client::create($request->all());
        Envio::create($request->all()+[
            'fecha_venta'=>Carbon::now('America/Tegucigalpa'),
        ]);

        $details=[

            'title' => 'Focus Store Nuevo Envio',
            'body' => 'Nuevo Envio ingresado',

        ];
/*
 */     Mail::to('dlproject995@gmail.com')->send(new TestMail($details));

        return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
