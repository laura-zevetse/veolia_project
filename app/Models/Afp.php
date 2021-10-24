<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_afp
 * @property string $nombre_afp
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Afp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'afp';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_afp';

    /**
     * @var array
     */
    protected $fillable = ['nombre_afp', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'afp', 'id_afp');
    }
}
