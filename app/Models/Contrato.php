<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_contrato
 * @property int $id_persona
 * @property int $tipo_contrato
 * @property int $cargo
 * @property int $area
 * @property int $gerencia
 * @property int $sede
 * @property int $unidad_negocio
 * @property int $estrategico
 * @property int $centro_costo
 * @property int $tipo_dotacion
 * @property int $banco
 * @property int $eps
 * @property int $afp
 * @property int $fondo_cesantias
 * @property int $riesgo
 * @property int $caja_compensac
 * @property float $salario
 * @property string $fecha_ingreso
 * @property string $fecha_vencimiento
 * @property int $antiguedad
 * @property integer $num_cuenta
 * @property Persona $persona
 * @property Cargo $cargo
 * @property Area $area
 * @property Gerencium $gerencium
 * @property CentCosto $centCosto
 * @property Sede $sede
 * @property UnidadNegocio $unidadNegocio
 * @property Estrategico $estrategico
 * @property TipoDotacion $tipoDotacion
 * @property Riesgo $riesgo
 * @property Banco $banco
 * @property CajaCompensac $cajaCompensac
 * @property Ep $ep
 * @property Afp $afp
 * @property FondoCesantia $fondoCesantia
 * @property TipoContrato $tipoContrato
 * @property Incapacidad[] $incapacidads
 */
class Contrato extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contrato';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_contrato';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_persona', 'tipo_contrato', 'cargo', 'area', 'gerencia', 'sede', 'unidad_negocio', 'estrategico', 'centro_costo', 'tipo_dotacion', 'banco', 'eps', 'afp', 'fondo_cesantias', 'riesgo', 'caja_compensac', 'salario', 'fecha_ingreso', 'fecha_vencimiento', 'antiguedad', 'num_cuenta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'id_persona', 'id_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargo', 'cargo', 'id_cargo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'area', 'id_area');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gerencia()
    {
        return $this->belongsTo('App\Models\Gerencia', 'gerencia', 'id_gerencia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function centCosto()
    {
        return $this->belongsTo('App\Models\CentCosto', 'centro_costo', 'id_centro_costo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sede()
    {
        return $this->belongsTo('App\Models\Sede', 'sede', 'id_sede');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidadNegocio()
    {
        return $this->belongsTo('App\Models\UnidadNegocio', 'unidad_negocio', 'id_und_negocio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estrategico()
    {
        return $this->belongsTo('App\Models\Estrategico', 'estrategico', 'id_estrategico');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDotacion()
    {
        return $this->belongsTo('App\Models\TipoDotacion', 'tipo_dotacion', 'id_tipo_dotac');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function riesgo()
    {
        return $this->belongsTo('App\Models\Riesgo', 'riesgo', 'id_riesgo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function banco()
    {
        return $this->belongsTo('App\Models\Banco', 'banco', 'id_banco');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cajaCompensac()
    {
        return $this->belongsTo('App\Models\CajaCompensac', 'caja_compensac', 'id_caja_compensac');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eps()
    {
        return $this->belongsTo('App\Models\Eps', 'eps', 'id_eps');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function afp()
    {
        return $this->belongsTo('App\Models\Afp', 'afp', 'id_afp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fondoCesantia()
    {
        return $this->belongsTo('App\Models\FondoCesantia', 'fondo_cesantias', 'id_fondo_cesantias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoContrato()
    {
        return $this->belongsTo('App\Models\TipoContrato', 'tipo_contrato', 'id_tipo_contrato');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incapacidads()
    {
        return $this->hasMany('App\Models\Incapacidad', 'id_contrato', 'id_contrato');
    }
}
