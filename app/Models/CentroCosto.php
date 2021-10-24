<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_centro_costo
 * @property string $nombre_centcosto
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class CentroCosto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cent_costo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_centro_costo';

    /**
     * @var array
     */
    protected $fillable = ['nombre_centcosto', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'centro_costo', 'id_centro_costo');
    }
}
