<?php

namespace Modules\Consultor\Actions;
use Modules\Consultor\Entities\Usuario;
use Modules\Consultor\Entities\ReporteMensual;

class CalcularSaldo
{

  public static function execute($consultor){
    $totalGanancia=0;
    $totalCostoFijo=0;
    $totalComision=0;
    $totalLucro=0;
    $total=array();
    if($consultor->reportes!=null){
      foreach ($consultor->reportes as $reporte) {
        $totalGanancia= $totalGanancia + $reporte->getGanancia();
        $totalComision= $totalComision + $reporte->getComision();
        $totalCostoFijo = $totalCostoFijo + $consultor->valorSalario();
        $totalLucro= $totalLucro  + $reporte->getLucro();
      }
      $total['total_ganancia']=$totalGanancia;
      $total['total_comision']=$totalComision;
      $total['total_costo_fijo']=$totalCostoFijo;
      $total['total_lucro']=$totalLucro;
      $consultor->totalSaldos=$total;
    }

  }


}
