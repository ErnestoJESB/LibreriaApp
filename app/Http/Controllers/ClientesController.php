<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('modulos.Clientes')->with('clientes', $clientes);
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
        $datos = request();

            Clientes::create([
                'nombre' => $datos['nombre'],
                'telefono' => $datos['telefono'],
                'documento' => $datos['documento'],
                'direccion' => $datos['direccion'],
                'fechaNac' => $datos['fechaNac'],
            ]);

            return redirect('Clientes')->with('ClienteCreado', 'OK');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($cli)
    {
        $cli = Clientes::find($cli);
        $clientes = Clientes::all();
        return view('modulos.Clientes', compact('cli', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request();

        DB::table('clientes')->where('id', $datos['id'])->update([
            'nombre' => $datos['nombre'],
            'telefono' => $datos['telefono'],
            'documento' => $datos['documento'],
            'direccion' => $datos['direccion'],
            'fechaNac' => $datos['fechaNac'],
        ]);
        return redirect('Clientes')->with('ClienteActualizado', 'OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);
        return redirect('Clientes');
    }
}
