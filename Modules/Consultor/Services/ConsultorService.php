<?php

namespace Modules\Consultor\Services;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
use Modules\Consultor\Actions\EncontrarConsultoresXid;
use Modules\Consultor\Actions\EncontrarConsultoresActivos;
use Modules\Consultor\Actions\CalcularGananciaNeta;
use Modules\Results\Result;

class ConsultorService implements ConsultorServiceInterface{

  public function consultoresActivos():Result{
    $result = new Result();
    $result=EncontrarConsultoresActivos::execute($result);
    return $result;
  }

  public function calcularGanancias($data,Result $result){

    if (!array_key_exists('consultores',$data)) {
      $result->setStatus('EMPTY_CONSULTORS');
      $result->addMessage('[EMPTY_DATA] # Empty data from resource requested');
      $result->setCode(200);
      return $result;
    }
    $resultAction= EncontrarConsultoresXid::execute($data,$result);

    if ($resultAction->findMessage('[LIST_DATA]')) {

      foreach ($resultAction->getData('consultores') as $consultor) {
        dd($data);
        CalcularGananciaNeta::execute($consultor);
      }

    }
    $result->addData('consultores', $resultAction->getData('consultores'));
    return $result;
  }
}
