<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_tipo_doc
 * @property string $nombre_tipo_doc
 * @property string $descripcion
 * @property Persona[] $personas
 */
class TipoDocumento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_documento';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_tipo_doc';

    /**
     * @var array
     */
    protected $fillable = ['nombre_tipo_doc', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'tipo_documento', 'id_tipo_doc');
    }
}
