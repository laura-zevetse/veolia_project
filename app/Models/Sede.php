<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_sede
 * @property string $nombre_sede
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Sede extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sede';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_sede';

    /**
     * @var array
     */
    protected $fillable = ['nombre_sede', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'sede', 'id_sede');
    }
}
