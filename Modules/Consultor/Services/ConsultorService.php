<?php

namespace Modules\Consultor\Services;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
use Modules\Consultor\Actions\EncontrarConsultoresActivos;
use Modules\Results\Result;

class ConsultorService implements ConsultorServiceInterface{

  public function consultoresActivos():Result{
    $result = new Result();
    $result=EncontrarConsultoresActivos::execute($result);
    return $result;
  }
}
