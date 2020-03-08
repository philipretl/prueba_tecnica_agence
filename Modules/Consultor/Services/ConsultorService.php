<?php

namespace Modules\Consultor\Services;
use Modules\Consultor\Interfaces\ConsultorServiceInterface;
use Modules\Consultor\Actions\EncontrarConsultoresXid;
use Modules\Consultor\Actions\EncontrarConsultoresActivos;
use Modules\Consultor\Actions\GenerarFecha;
use Modules\Consultor\Actions\CalcularSaldo;
use Modules\Consultor\Actions\GenerarInforme;
use Modules\Consultor\Actions\ReporteDesempenio;
use Modules\Consultor\Actions\ReporteGanancia;
use Modules\Consultor\Validators\GananciasInformeValidator;
use Modules\Results\Result;


class ConsultorService implements ConsultorServiceInterface{

  public function consultoresActivos():Result{
    $result = new Result();
    $result=EncontrarConsultoresActivos::execute($result);
    return $result;
  }

  public function calcularGanancias($data,Result $result){

    $resultValidator = GananciasInformeValidator::execute($data);

    if ($resultValidator->getStatus()!='VALIDATED') {
      return $resultValidator;
    }
    $resultAction= EncontrarConsultoresXid::execute($data,$result);

    if ($resultAction->findMessage('[LIST_DATA]')) {

      $fechaInicial=GenerarFecha::execute($data['month_from'], $data['year_from']);

      $fechaFinal=GenerarFecha::execute($data['month_to'], $data['year_to']);

      foreach ($resultAction->getData('consultores') as $consultor) {
        $generar=new GenerarInforme();
        $generar->execute($consultor,$fechaInicial,$fechaFinal);

        CalcularSaldo::execute($consultor);
      }

    }
    $result->addData('consultores', $resultAction->getData('consultores'));
    $result->addData('fecha_inicial', $fechaInicial->format('Y-m-d'));
    $result->addData('fecha_final', $fechaFinal->format('Y-m-d'));

    return $result;
  }

  public function generarReporteDesempenio($data){

    $result = new Result();

    if (!empty($data['consultores'])) {
      $result=ReporteDesempenio::execute($data['consultores'], $data['fecha_inicial'], $data['fecha_final']);
    }

    return $result;
  }

  public function generarReporteGanancia($data){

    $result = new Result();

    if (!empty($data['consultores'])) {
      $result=ReporteGanancia::execute($data['consultores'], $data['fecha_inicial'], $data['fecha_final']);
    }

    return $result;
  }
}
