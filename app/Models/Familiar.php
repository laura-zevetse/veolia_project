<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_familiar
 * @property int $id_persona
 * @property int $parentezco
 * @property int $sexo_fliar
 * @property string $apellidos_fliar
 * @property string $nombres_fliar
 * @property string $fecha_nac_fliar
 * @property integer $edad_fliar
 * @property Sexo $sexo
 * @property Persona $persona
 * @property Parentezco $parentezco
 */
class Familiar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'familiar';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_familiar';

    /**
     * @var array
     */
    protected $fillable = ['id_persona', 'parentezco', 'sexo_fliar', 'apellidos_fliar', 'nombres_fliar', 'fecha_nac_fliar', 'edad_fliar'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'sexo_fliar', 'id_sexo');
    }

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
    public function parentezco()
    {
        return $this->belongsTo('App\Models\Parentezco', 'parentezco', 'id_parentezco');
    }
}
