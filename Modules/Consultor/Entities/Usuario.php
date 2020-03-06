<?php

namespace Modules\Consultor\Entities;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='cao_usuario';
    protected $primaryKey='co_usuario';
    public $incrementing = false;
    protected $fillable = [
      'co_usuario',
      'no_usuario',
      'ds_senha',
      'co_usuario_autorizacao',
      'nu_matricula',
      'dt_nascimiento',
      'dt_admissao_empresa',
      'dt_desligamiento',
      'dt_inclusao',
      'dt_expiracao',
      'nu_cpf',
      'nu_rg',
      'no_orgao_emissor',
      'uf_orgao_emissor',
      'no_email',
      'no_email_personal',
      'nu_telefone',
      'dt_alteracao',
      'url_foto',
      'instant_messenger',
      'icq',
      'msn',
      'yms',
      'ds_comp_end',
      'ds_bairro',
      'nu_cep',
      'no_cidade',
      'uf_cidade',
      'dt_expedicao'
    ];

    public function permiso(){
      return $this->hasOne('Modules\Consultor\Entities\PermisoSistema','co_usuario');
    }
}
