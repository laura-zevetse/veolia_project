<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_und_negocio
 * @property string $nombre_und_negocio
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class UnidadNegocio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidad_negocio';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_und_negocio';

    /**
     * @var array
     */
    protected $fillable = ['nombre_und_negocio', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'unidad_negocio', 'id_und_negocio');
    }
}
