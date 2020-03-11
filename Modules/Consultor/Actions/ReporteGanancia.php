<?php

namespace Modules\Consultor\Actions;

use Modules\Results\Result;
use Modules\Consultor\Entities\Usuario;
use Modules\Consultor\Charts\ConsultorChart;
use Modules\Consultor\Actions\CalcularSaldo;
use Modules\Consultor\Actions\GenerarInforme;
use Modules\Consultor\Actions\GenerarColorRandom;

class ReporteGanancia
{

  public static function execute($consultores, $fechaInicial, $fechaFinal){

    $result= new Result();
    $generarInforme=new GenerarInforme();
    $fechaInicial=explode('-',$fechaInicial);
    $fechaFinal=explode('-',$fechaFinal);
    $flag=false;

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

    $gananciaChart = new ConsultorChart();
    $valores=array();
    $labels=array();
    $colores=array();


    foreach ($consultoresTemp as $consultor) {
      $generarInforme->execute($consultor, $fechaInicial, $fechaFinal->subMonths(1));

      if (!empty($consultor->reportes)) {
        $flag=true;
      }
      CalcularSaldo::execute($consultor);
      if($consultor->totalSaldos!=null){
        array_push($valores,round($consultor->totalSaldos['total_ganancia']));
        array_push($labels,$consultor->co_usuario);
        array_push($colores,GenerarColorRandom::execute());
      }


    }

    $color=GenerarColorRandom::execute();
    $gananciaChart->labels($labels);
    $gananciaChart->dataset($consultor->co_usuario, 'doughnut',$valores)
    ->color($color)
    ->backgroundcolor($colores);

    if ($flag==false) {
      $result->setStatus('EMPTY');
    }
    $gananciaChart->title('Informe de ganancia de los consultores', 30, "rgb(255, 99, 132)", true, 'Helvetica Neue');

    $result->addData('ganancia_chart', $gananciaChart);

    return $result;
  }
}
