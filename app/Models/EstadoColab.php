<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_est_colab
 * @property string $nombre_est_colab
 * @property string $descripcion
 * @property Persona[] $personas
 */
class EstadoColab extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estado_colab';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_est_colab';

    /**
     * @var array
     */
    protected $fillable = ['nombre_est_colab', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'estado_colab', 'id_est_colab');
    }
}
