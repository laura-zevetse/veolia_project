<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_ciudad
 * @property string $nombre_ciudad
 * @property Persona[] $personas
 * @property Persona[] $personas
 */
class Ciudad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_ciudad';

    /**
     * @var array
     */
    protected $fillable = ['nombre_ciudad'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'ciudad_exp', 'id_ciudad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas_res()
    {
        return $this->hasMany('App\Models\Persona', 'ciudad_resid', 'id_ciudad');
    }
}
