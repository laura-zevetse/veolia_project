<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_dotac
 * @property string $nombre_tipo_dotac
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class TipoDotacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_dotacion';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_dotac';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_dotac', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'tipo_dotacion', 'id_tipo_dotac');
    }
}
