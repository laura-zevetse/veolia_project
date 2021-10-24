<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_sexo
 * @property string $nombre_sexo
 * @property string $descripcion
 * @property Persona[] $personas
 * @property Familiar[] $familiars
 */
class Sexo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sexo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_sexo';

    /**
     * @var array
     */
    protected $fillable = ['nombre_sexo', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'sexo', 'id_sexo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familiars()
    {
        return $this->hasMany('App\Models\Familiar', 'sexo_fliar', 'id_sexo');
    }
}
