<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_sang
 * @property string $nombre_tipo_sang
 * @property string $descripcion
 * @property Persona[] $personas
 */
class TipoSangre extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_sangre';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_sang';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_sang', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'tipo_sangre', 'id_tipo_sang');
    }
}
