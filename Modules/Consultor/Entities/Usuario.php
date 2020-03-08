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
    public function salario(){
      return $this->hasOne('Modules\Consultor\Entities\Salario','co_usuario');
    }

    public function valorSalario(){
      $salario=$this->salario;
      $valorSalario;
      if($salario!=null){
        $valorSalario=$salario->brut_salario;
      }else{
        $valorSalario=0;
      }
      return $valorSalario;
    }
    
    public function factura(){
      return $this->hasManyThrough('Modules\Consultor\Entities\Factura','Modules\Consultor\Entities\OrdenServicio','co_usuario','co_os','co_usuario','co_os');
    }
}
