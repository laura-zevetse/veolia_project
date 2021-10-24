<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_fondo_cesantias
 * @property string $nombre_fondo_ces
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class FondoCesantias extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_fondo_cesantias';

    /**
     * @var array
     */
    protected $fillable = ['nombre_fondo_ces', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'fondo_cesantias', 'id_fondo_cesantias');
    }
}
