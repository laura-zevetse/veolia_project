<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_eps
 * @property string $nombre_eps
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Eps extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_eps';

    /**
     * @var array
     */
    protected $fillable = ['nombre_eps', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'eps', 'id_eps');
    }
}
