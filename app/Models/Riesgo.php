<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_riesgo
 * @property string $nombre_riesgo
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Riesgo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'riesgo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_riesgo';

    /**
     * @var array
     */
    protected $fillable = ['nombre_riesgo', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'riesgo', 'id_riesgo');
    }
}
