<?php

namespace Modules\Consultor\Actions;

use Modules\Results\Result;
use Modules\Consultor\Entities\Usuario;
use Modules\Consultor\Charts\ConsultorChart;
use Modules\Consultor\Actions\GenerarInforme;
use Modules\Consultor\Actions\GenerarColorRandom;

class ReporteGanancia
{

  public static function execute($consultores, $fechaInicial, $fechaFinal){

    $result= new Result();
    $generarInforme=new GenerarInforme();
    $fechaInicial=explode('-',$fechaInicial);
    $fechaFinal=explode('-',$fechaFinal);

    $consultoresTemp=array();

    $fechaInicial=GenerarFecha::execute($fechaInicial[1] ,$fechaInicial[0], $fechaInicial[2]);
    $fechaFinal=GenerarFecha::execute($fechaFinal[1] ,$fechaFinal[0], $fechaFinal[2]);
    //dd($consultores);
    $object = (array)json_decode($consultores);
    $collection = Usuario::hydrate($object);
    $consultores = $collection->flatten();

    foreach ($consultores as $consultor) {
      array_push($consultoresTemp, Usuario::where('co_usuario',$consultor->co_usuario)->first());
    }

    $desempenioChart = new ConsultorChart();
    $meses=array();
    $costoFijoPromedio=array();
    $costoFijo=0;
    foreach ($consultoresTemp as $consultor) {
      $valores=array();
      $generarInforme->execute($consultor, $fechaInicial, $fechaFinal->subMonths(1));
      $color=GenerarColorRandom::execute();
      $backGroundColor=GenerarColorRandom::execute();
      dd($consultor);
      $desempenioChart->dataset($consultor->co_usuario, 'bar',$valores)
      ->color($color)
      ->backgroundcolor($backGroundColor);
      $desempenioChart->labels($meses);
      $desempenioChart->labels(array_unique($meses));


    }

    if (empty($desempenioChart->datasets)) {
      $result->setStatus('EMPTY');
    }
    $result->addData('desempenio_chart', $desempenioChart);
  
    return $result;
  }
}
