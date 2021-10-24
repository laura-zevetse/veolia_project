<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_cargo
 * @property string $nombre_cargo
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Cargo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cargo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_cargo';

    /**
     * @var array
     */
    protected $fillable = ['nombre_cargo', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'cargo', 'id_cargo');
    }
}
