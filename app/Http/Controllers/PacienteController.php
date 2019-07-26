<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax())  return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;

        if ($buscar==''){
            $pacientes = Paciente::orderBy('id', 'desc')->paginate(2);
        }
        else{
            $pacientes = Paciente::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(2);
        }
        // $pacientes = Paciente::paginate(2);
        return [
            'pagination' => [
                'total'         => $pacientes->total(),
                'current_page'  => $pacientes->currentPage(),
                'per_page'      => $pacientes->perPage(),
                'last_page'     => $pacientes->lastPage(),
                'from'          => $pacientes->firstItem (),
                'to'            => $pacientes->lastItem(),
            ],
            'pacientes' => $pacientes
        ];
        //return $pacientes;
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
        if (!$request->ajax())  return redirect('/');
        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        // $paciente->tipo_ducumento = $request->tipo_documento;
        // $paciente->num_documento = $request->num_documento;
        // $paciente->expedido = $request->expedido;
        // $paciente->direccion = $request->direccion;
        // $paciente->num_emergencia = $request->num_emergencia;
        // $paciente->email = $request->email;
        $paciente->condicion = '1';
        $paciente->save();
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
    public function update(Request $request)
    {
        if (!$request->ajax())  return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->nombres = $request->nombres;
        $paciente->apellidos = $request->apellidos;
        // $paciente->tipo_ducumento = $request->tipo_documento;
        // $paciente->num_documento = $request->num_documento;
        // $paciente->expedido = $request->expedido;
        // $paciente->direccion = $request->direccion;
        // $paciente->num_emergencia = $request->num_emergencia;
        // $paciente->email = $request->email;
        $paciente->condicion = '1';
        $paciente->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax())  return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->condicion = '0';
        $paciente->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax())  return redirect('/');
        $paciente = Paciente::findOrFail($request->id);
        $paciente->condicion = '1';
        $paciente->save();
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
