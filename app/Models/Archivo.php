<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_archivo
 * @property int $id_persona
 * @property string $soporte
 * @property string $observaciones
 * @property Persona $persona
 */
class Archivo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'archivo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_archivo';

    /**
     * @var array
     */
    protected $fillable = ['id_persona', 'soporte', 'observaciones'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo('App\Models\Persona', 'id_persona', 'id_persona');
    }
}
