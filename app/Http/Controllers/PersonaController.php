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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


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
     * Funcion encargada de guardar data personal del cliente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {

        $arrResponse = array();
    	$validator = Validator::make($request->all(), [
            'primer_apellido' => 'required|min:3|max:15',
            'nombre' => 'required',
            'id_persona' => 'required|digits_between:7,15|unique:persona',
            'ciudad_exp' => 'required',
            'email' => 'required|email|regex:/(.*)@veolia\.com$/i|',
            'fecha_nacimiento' => 'required'
        ]);
        if ($validator->passes())
        {
            $datosPersona = request()->except('_token');
            $archivo = $request->file('foto');
            /*if(){
                dd($archivo);
                $nombre=$archivo->getClientOriginalName();
                $archivo->move('img', $nombre);
                $datosPersona['foto']=$nombre;
            }*/

           /* Persona::insert($datosPersona);
            $dataPerson = $this->getDataPerson($request['id_persona']);
            $arrResponse['status'] = true;
            $arrResponse['message'] = 'Información guardada con éxito!';
            $arrResponse['info'] = $dataPerson;
            return response()->json($arrResponse, 200);
        }
        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }*/
    /*}*/

    public function store(Request $request)
    {
        $arrResponse = array();
        $validator = Validator::make($request->all(), [
            'primer_apellido' => 'required|min:3|max:15',
            'nombre' => 'required',
            'id_persona' => 'required|digits_between:7,16|unique:persona',
            //'ciudad_exp' => 'required',
            'email' => 'required|email|regex:/(.*)@veolia\.com$/i|',
            //'fecha_nacimiento' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $persona = new Persona;
        $archivo = $request->file('foto');
        if ($archivo) {
            $imagePath = $request->file('foto');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('foto')->storeAs('img', $imageName, 'public');
            $persona->foto = '/storage/'.$path;
        }
        if ($validator->passes())
        {
            $persona->primer_apellido = $request->primer_apellido;
            $persona->id_persona = $request->id_persona;
            $persona->nombre = $request->nombre;
            $persona->email = $request->email;
            $persona->save();
            $dataPerson = $this->getDataPerson($request['id_persona']);
            $arrResponse['status'] = true;
            $arrResponse['message'] = 'Información guardada con éxito!';
            $arrResponse['info'] = $dataPerson;
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
        return response()->json([
            'status' => true,
            'message' => 'Familiar registrado con exito'
        ], 200);
    }

    public function contrato(Request $request)
    {
        $arrResponse = array();
        $validator = Validator::make($request->all(), [
            'tipo_contrato' => 'required',
            'id_persona' => 'required|digits_between:7,16'
        ]);
        if ($validator->passes()) {
            $datosContrato = request()->except('_token');
            Contrato::insert($datosContrato);
            $arrResponse['status'] = true;
            $arrResponse['message'] = 'Contrato generado con éxito !';
            return response()->json($arrResponse, 200);
        }
        if ($validator->fails())
        {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 400);
        }
    }

    /**
     * metodo que guarda el contrato del colaborador
     */
    public function archivo(Request $request)
    {
        
        request()->validate([
            'soporte'  => 'required|mimes:pdf|max:2048' 
        ]);




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
        $contratos = $persona->contrato;
        $familiares = DB::table('familiar')
        ->select('familiar.id_persona','familiar.nombres_fliar', 'familiar.apellidos_fliar', 'familiar.apellidos_fliar','familiar.id_familiar','familiar.edad_fliar','familiar.sexo_fliar', 'p.nombre_parentezco')
        ->join('parentezco as p', 'p.id_parentezco', '=', 'familiar.parentezco')
        ->where('familiar.id_persona', '=', $id_persona)
        ->get()->toArray();
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
    public function getDataPerson($id)
    {
        $data = Persona::findData($id);
        $arrResponse = array();
        $arrResponse['status'] = true;
        $arrResponse['msg'] = 'VERDADERO';
        $arrResponse['data'] = $data;
        return response()->json($arrResponse);
    }

}
