<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;
use App\Models\Client;

class SearchController extends Controller
{
    //
    public function __invoke(Request $request){

        $search = $request->input('search');

        $ventas = Client::query()
                    ->where('telefono', 'LIKE', "{$search}")
                    /* ->orWhere('body', 'LIKE', "%{$search}%") */
                    ->get();
        if(count ( $ventas ) > 0){
            return view('datoscliente', compact('ventas'));
        }
        else{
            return redirect('inicio');
        }

    }
}
