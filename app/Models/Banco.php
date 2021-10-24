<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_banco
 * @property string $nombre_banco
 * @property string $descripcion
 * @property Contrato[] $contratos
 */
class Banco extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'banco';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_banco';

    /**
     * @var array
     */
    protected $fillable = ['nombre_banco', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'banco', 'id_banco');
    }
}
