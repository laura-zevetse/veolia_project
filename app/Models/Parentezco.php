<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_parentezco
 * @property string $nombre_parentezco
 * @property string $descripcion
 * @property Familiar[] $familiars
 */
class Parentezco extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parentezco';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_parentezco';

    /**
     * @var array
     */
    protected $fillable = ['nombre_parentezco', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function familiars()
    {
        return $this->hasMany('App\Models\Familiar', 'parentezco', 'id_parentezco');
    }
}
