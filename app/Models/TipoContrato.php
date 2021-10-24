<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_contrato
 * @property string $nombre_tip_contrato
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class TipoContrato extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_contrato';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_contrato';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tip_contrato', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'tipo_contrato', 'id_tipo_contrato');
    }
}
