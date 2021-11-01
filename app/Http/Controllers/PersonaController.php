<?php

namespace App\Http\Controllers;

use App\Models\Afp;
use App\Models\Archivo;
use App\Models\Area;
use App\Models\Banco;
use App\Models\CajaCompensacion;
use App\Models\Cargo;
use App\Models\CentroCosto;
use App\Models\Ciudad;
use App\Models\Contrato;
use App\Models\Educacion;
use App\Models\Eps;
use App\Models\EstadoColab;
use App\Models\Estrategico;
use App\Models\Familiar;
use App\Models\FondoCesantias;
use App\Models\Gerencia;
use App\Models\Parentezco;
use App\Models\Persona;
use App\Models\Riesgo;
use App\Models\Sede;
use App\Models\Sexo;
use App\Models\TipoContrato;
use App\Models\TipoDocumento;
use App\Models\TipoDotacion;
use App\Models\TipoSangre;
use App\Models\UnidadNegocio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPerson(Request $request)
    {
        $busqueda = trim($request->get('busqueda'));
        $personas = DB::table('persona')
            ->select('*')
            ->orderBy('primer_apellido', 'asc')
            ->get();


        return View::make('persona.index', compact('personas', 'busqueda'));
    }

    public function age(Request $request){
        $fecha_nacimiento = $request->date('fecha_nacimiento');
        $edades = Carbon::parse($fecha_nacimiento)->edades;
        return view('persona.createPerson')->with('edades', $edades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::all();

        $parentezcos = Parentezco::all();
        $ciudades = Ciudad::all();
        $educaciones = Educacion::all();
        $estados = EstadoColab::all();
        $tipos_doc = TipoDocumento::all();
        $tipos_sang = TipoSangre::all();
        $sexos = Sexo::all();

        $afps = Afp::all();
        $areas = Area::all();
        $bancos = Banco::all();
        $cajas_compen = CajaCompensacion::all();
        $cargos = Cargo::all();
        $cents_costo = CentroCosto::all();
        $epss = Eps::all();
        $estrategicos = Estrategico::all();
        $fondos_ces = FondoCesantias::all();
        $gerencias = Gerencia::all();
        $riesgos = Riesgo::all();
        $sedes = Sede::all();
        $tipos_dot = TipoDotacion::all();
        $tipos_contr = TipoContrato::all();
        $uns_negoc = UnidadNegocio::all();
        $fechaActual = date('Y-m-d');

        return view('persona.createPerson', compact(
            'ciudades',
            'educaciones',
            'estados',
            'personas',
            'tipos_doc',
            'tipos_sang',
            'sexos',
            'parentezcos',
            'afps',
            'areas',
            'bancos',
            'cajas_compen',
            'cargos',
            'cents_costo',
            'epss',
            'estrategicos',
            'fondos_ces',
            'gerencias',
            'riesgos',
            'sedes',
            'tipos_dot',
            'tipos_contr',
            'uns_negoc',
            'fechaActual'
        ));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrResponse = array();
    	$validator = Validator::make($request->all(), [
            'foto' => 'image',
            'primer_apellido' => 'required|min:3|max:15',
            'nombre' => 'required',
            'id_persona' => 'required|digits_between:7,15',
            'ciudad_exp' => 'required',
            'email' => 'required|email|regex:/(.*)@veolia\.com$/i|',
            'fecha_nacimiento' => 'required'
        ]);
        if ($validator->passes()) 
        {
            $datosPersona = request()->except('_token');
            if($archivo=$request->file('foto')){
                $nombre=$archivo->getClientOriginalName();
                $archivo->move('img', $nombre);
                $datosPersona['foto']=$nombre;
            }
            Persona::insert($datosPersona);
            $arrResponse['status'] = true;
            $arrResponse['message'] = 'Información guardada con éxito !';
            return response()->json($arrResponse, 200);
        }
        if ($validator->fails())
        { 
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        
    }

    public function familiar(Request $request)
    {
        $datosFamiliar = request()->except('_token');
        Familiar::insert($datosFamiliar);
        return back();
    }


    public function contrato(Request $request)
    {
        $request->validate([
            'tipo_contrato' => 'required'
        ]);

        $datosContrato = request()->except('_token');
        Contrato::insert($datosContrato);
        return back();
    }

    public function archivo(Request $request)
    {
        $documento = request()->except('_token');
        Archivo::insert($documento);
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
    public function edit($id_persona)
    {
        $persona = Persona::findOrFail($id_persona);
        $contratos=$persona->contrato;
        $familiares=$persona->familiar;

       /* $familiares2 = DB::table('persona')
            ->join('familiar', 'id_persona', '=', 'familiar.id_persona')
            ->join('parentezco', 'id_parentezo', '=', 'familiar.id_parentezco')
            ->select('familiar.*', 'parentezco.nombre_parentezco')
            ->get();
*/
       // dd($familiares);

        $parentezcos = Parentezco::all();
        $sexos = Sexo::all();

        $ciudades = Ciudad::all();
        $educaciones = Educacion::all();
        $estados = EstadoColab::all();

        $tipos_doc = TipoDocumento::all();
        $tipos_sang = TipoSangre::all();

        $afps = Afp::all();
        $areas = Area::all();
        $bancos = Banco::all();
        $cajas_compen = CajaCompensacion::all();
        $cargos = Cargo::all();
        $cents_costo = CentroCosto::all();
        $epss = Eps::all();
        $estrategicos = Estrategico::all();
        $fondos_ces = FondoCesantias::all();
        $gerencias = Gerencia::all();
        $riesgos = Riesgo::all();
        $sedes = Sede::all();
        $tipos_dot = TipoDotacion::all();
        $tipos_contr = TipoContrato::all();
        $uns_negoc = UnidadNegocio::all();



        return view('persona.editPerson', $persona, compact(
            'persona',
            'contratos',
            'familiares',
            'ciudades',
            'educaciones',
            'estados',
            'sexos',
            'tipos_doc',
            'tipos_sang',
            'parentezcos',
            'afps',
            'areas',
            'bancos',
            'cajas_compen',
            'cargos',
            'cents_costo',
            'epss',
            'estrategicos',
            'fondos_ces',
            'gerencias',
            'riesgos',
            'sedes',
            'tipos_dot',
            'tipos_contr',
            'uns_negoc'
        ));
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
