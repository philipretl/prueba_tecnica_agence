<?php

namespace Modules\Consultor\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Consultor\Traits\HasCompositePrimaryKey;

class PermisoSistema extends Model
{
    use HasCompositePrimaryKey;

    protected $table='permissao_sistema';
    protected $primaryKey = ['co_usuario', 'co_tipo_usuario','co_sistema'];
    public $incrementing = false;
    protected $fillable = [
      'co_usuario',
      'co_tipo_usuario',
      'co_sistema',
      'in_ativo'
    ];
}
