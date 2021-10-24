<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_estrategico
 * @property string $nombre_estrategico
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Estrategico extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estrategico';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_estrategico';

    /**
     * @var array
     */
    protected $fillable = ['nombre_estrategico', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'estrategico', 'id_estrategico');
    }
}
