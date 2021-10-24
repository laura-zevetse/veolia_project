<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_persona
 * @property int $tipo_documento
 * @property int $ciudad_exp
 * @property int $sexo
 * @property int $tipo_sangre
 * @property int $educacion
 * @property int $ciudad_resid
 * @property int $estado_colab
 * @property string $primer_apellido
 * @property string $segundo_apellido
 * @property string $nombre
 * @property string $foto
 * @property string $fecha_nacimiento
 * @property integer $edad
 * @property string $direccion
 * @property string $celular
 * @property string $email
 * @property string $nomapell_emrg
 * @property integer $contacto_emrg
 * @property Ciudad $ciudad
 * @property Ciudad $ciudad
 * @property Sexo $sexo
 * @property TipoDocumento $tipoDocumento
 * @property TipoSangre $tipoSangre
 * @property Educacion $educacion
 * @property EstadoColab $estadoColab
 * @property Familiar[] $familiars
 * @property Contrato[] $contratos
 * @property Archivo[] $archivos
 */
class Persona extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persona';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_persona';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['tipo_documento', 'ciudad_exp', 'sexo', 'tipo_sangre', 'educacion', 'ciudad_resid', 'estado_colab', 'primer_apellido', 'segundo_apellido', 'nombre', 'foto', 'fecha_nacimiento', 'edad', 'direccion', 'celular', 'email', 'nomapell_emrg', 'contacto_emrg'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad', 'ciudad_exp', 'id_ciudad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudad_resid()
    {
        return $this->belongsTo('App\Models\Ciudad', 'ciudad_resid', 'id_ciudad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'sexo', 'id_sexo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoDocumento()
    {
        return $this->belongsTo('App\Models\TipoDocumento', 'tipo_documento', 'id_tipo_doc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoSangre()
    {
        return $this->belongsTo('App\Models\TipoSangre', 'tipo_sangre', 'id_tipo_sang');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function educacion()
    {
        return $this->belongsTo('App\Models\Educacion', 'educacion', 'id_educacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadoColab()
    {
        return $this->belongsTo('App\Models\EstadoColab', 'estado_colab', 'id_est_colab');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familiars()
    {
        return $this->hasMany('App\Models\Familiar', 'id_persona', 'id_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'id_persona', 'id_persona');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function archivos()
    {
        return $this->hasMany('App\Models\Archivo', 'id_persona', 'id_persona');
    }
}
