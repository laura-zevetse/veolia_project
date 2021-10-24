<?php

namespace App\Http\Controllers;

use App\Models\Eps;
use App\Models\Incapacidad;
use App\Models\Persona;
use App\Models\TipoIncapacidad;
use Faker\Provider\ar_JO\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class IncapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listIncap(Request $request)
    {
        $personas = Persona::all();
        $incapacidades = Incapacidad::all();
        $tiposIncapacidad = TipoIncapacidad::all();

        $listar = DB::select('select c.id_persona, a.fecha_inicio, a.fecha_final, d.nombre_eps, e.nombre_tipo_incapac
        from incapacidad a, contrato b, persona c, eps d, tipo_incapacidad e
        where a.id_contrato=b.id_contrato and b.id_persona=c.id_persona
        and b.eps=d.id_eps and a.id_tipo_incapacidad=e.id_tipo_incapacidad;');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPersonContIncap()
    {

    }

    public function createIncap()
    {
        $tipoIncapacidad = TipoIncapacidad::all();
        $epss = Eps::all();

        $datos = DB::select('select c.id_contrato, p.nombre, p.primer_apellido, p.segundo_apellido from contrato c
        inner join persona p on p.id_persona = c.id_persona;');
        return view('incapacidad.createIncap', compact('datos', 'tipoIncapacidad', 'epss'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIncap(Request $request)
    {
        $request->validate([
            'id_contrato' => 'required',
            'id_tipo_incapacidad' => 'required',
            'id_eps' => 'required',
            'fecha_inicio' => 'required',
            'soporte' => 'required'
        ]);

        $datosIncap = request()->except('_token');
        Incapacidad::insert($datosIncap);
        return back();
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
    public function editIncap($id)
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
    public function updateIncap(Request $request, $id)
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
