<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_incapacidad
 * @property int $id_contrato
 * @property int $id_persona
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property string $soporte
 * @property string $observaciones
 * @property Contrato $contrato
 * @property TipoIncapacidad $tipoIncapacidad
 */
class Incapacidad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incapacidad';
    protected $primaryKey = 'id_incapacidad';

    /**
     * @var array
     */
    protected $fillable = ['id_tipo_incapacidad', 'id_contrato', 'id_persona', 'fecha_inicio', 'fecha_final', 'soporte', 'observaciones'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contrato()
    {
        return $this->belongsTo('App\Models\Contrato', 'id_contrato', 'id_contrato');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoIncapacidad()
    {
        return $this->belongsTo('App\Models\TipoIncapacidad', 'id_tipo_incapacidad', 'id_tipo_incapacidad');
    }
}
