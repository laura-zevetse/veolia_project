<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_gerencia
 * @property string $nombre_gerencia
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Gerencia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gerencia';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_gerencia';

    /**
     * @var array
     */
    protected $fillable = ['nombre_gerencia', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'gerencia', 'id_gerencia');
    }
}
