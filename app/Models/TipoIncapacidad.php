<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_incapacidad
 * @property string $nombre_tipo_incapac
 * @property string $descripcion
 * @property Incapacidad[] $incapacidads
 */
class TipoIncapacidad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_incapacidad';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_incapacidad';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_incapac', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incapacidads()
    {
        return $this->hasMany('App\Models\Incapacidad', 'id_tipo_incapacidad', 'id_tipo_incapacidad');
    }
}
