<?php

namespace Modules\Consultor\Actions;
use Modules\Results\Result;
use Modules\Consultor\Entities\Usuario;

class EncontrarConsultoresActivos{

  public static function execute(Result $result):Result{
    $consultores = Usuario::with('permiso')->get();

    $consultoresActivos = $consultores->reject(function ($consultor) {
      if ($consultor->permiso!=null) {
        return $consultor->permiso->co_tipo_usuario != 1;
      }

    });
    $consultoresActivos = $consultoresActivos->reject(function ($consultor) {

        return $consultor->co_usuario == null;

    });

    if ($consultoresActivos->isEmpty()) {
      $result->setStatus('EMPTY');
      $result->addMessage('[EMPTY_DATA] # Empty data from resource requested');
      $result->setCode(200);
    }else{
      $result->setStatus('SUCCESS');
      $result->addData('consultoresActivos', $consultoresActivos);
      $result->addMessage('[LIST_DATA] # List Data from resource requested');
      $result->addMessage('[LIST_DATA_PAGINATED] # List Data paginated from resource requested');
    }
    return $result;
  }
}
