<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_rol
 * @property string $nombre_rol
 * @property int $id_persona
 * @property Persona[] $personas
 */
class Rol extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rol';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_rol';

    /**
     * @var array
     */
    protected $fillable = ['nombre_rol', 'id_persona'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'id_rol', 'id_rol');
    }
}
