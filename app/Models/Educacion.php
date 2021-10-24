<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_educacion
 * @property string $nombre_educac
 * @property string $descripcion
 * @property Persona[] $personas
 */
class Educacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_educacion';

    /**
     * @var array
     */
    protected $fillable = ['nombre_educac', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'educacion', 'id_educacion');
    }
}
