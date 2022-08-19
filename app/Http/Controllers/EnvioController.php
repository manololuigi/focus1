<?php

namespace App\Http\Controllers;

use App\Models\Envio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $envios = Envio::paginate(5);
        return view('envios.index',compact('envios'));
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
            /* 'identidad' => 'required', */
            /* 'rtn' => 'required',
            'ct_alterno' => 'required', */
            'observaciones' => 'required'

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
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function show(Envio $envio)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function edit(Envio $envio)
    {
        //
        return view('envios.edit',compact('envio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Envio $envio)
    {
        //
        request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'telefono' => 'required',
            'dir_1' => 'required',
            'dir_2' => 'required',
            'email' => 'required',
          /*   'identidad' => 'required',
            'rtn' => 'required', */
            'ct_alterno' => 'required',
            'fecha_venta' => 'required',
            'forma_pago' => 'required',
            'total' => 'required',
        ]);

        $envio->update($request->all());

        return redirect()->route('envios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Envio  $envio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Envio $envio)
    {
        //
        $envio->delete();

        return redirect()->route('envios.index')->with('eliminar', 'ok');;
    }



    /* public function downloadPdf()
    {
        $users = Envio::all();

       view()->share('users.pdf',$users);

        $pdf = PDF::loadView('users.pdf', ['users' => $users]);

        return $pdf->download('users.pdf');
    } */
}
