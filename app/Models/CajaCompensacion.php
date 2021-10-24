<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_caja_compensac
 * @property string $nombre_caja_compensac
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class CajaCompensacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caja_compensac';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_caja_compensac';

    /**
     * @var array
     */
    protected $fillable = ['nombre_caja_compensac', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'caja_compensac', 'id_caja_compensac');
    }
}
