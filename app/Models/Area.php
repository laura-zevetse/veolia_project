<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_area
 * @property string $nombre_area
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Area extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'area';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_area';

    /**
     * @var array
     */
    protected $fillable = ['nombre_area', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'area', 'id_area');
    }
}
