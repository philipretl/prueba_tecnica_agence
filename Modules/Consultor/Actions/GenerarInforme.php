<?php

namespace Modules\Consultor\Actions;
use Modules\Consultor\Entities\Usuario;
use Modules\Consultor\Entities\ReporteMensual;
use Carbon\Carbon;

class GenerarInforme{
  private $consultor;

  public function execute(Usuario $consultor,Carbon $fechaInicial, Carbon $fechaFinal){
    $this->consultor=$consultor;

    $consultor->facturas=$consultor->factura;
    $reportesMensuales=array();

    //encontrar todas las facturas de un consultor del intervalo dado
    $facturas=$consultor->facturas
      ->where('data_emissao','<=',$fechaFinal->addMonths(1)->format('Y-m-d'))
      ->where('data_emissao','>=',$fechaInicial->format('Y-m-d'));

    //agrupar las facturas por mess
    $facturasPorMes= $facturas->groupBy(
      function ($factura){
        return Carbon::parse($factura->data_emissao)->format('m');
      }
    );
    //dd($facturasPorMes);

    if(!$facturasPorMes->isEmpty()){

      foreach ($facturasPorMes as $facMes) {

        $valor=$facMes->sum('valor');
        //dd($valor);
        $totalImpuestoInc=$facMes->sum(
          function($factura){
            return ($factura->valor*$factura->total_imp_inc/100);
          }
        );
        $totalComision=$facMes->sum(
          function($factura){
            return ($factura->valor - ($factura->valor*$factura->total_imp_inc/100))*$factura->comissao_cn/100;
          }
        );

        $totalLucro=$facMes->sum(
          function($factura){
            $valorImpuestos=($factura->valor*$factura->total_imp_inc/100);
            $valorCostoFijo=$this->consultor->valorSalario();
            $valorComision=($factura->valor - ($factura->valor*$factura->total_imp_inc/100))*$factura->comissao_cn/100;

            return ($factura->valor-$valorImpuestos)-($valorCostoFijo+$valorComision);
          }
        );

        $fecha = Carbon::parse($facMes->first()->data_emissao);
        $reporteMensual= new ReporteMensual(
          $valor,
          $fecha->format("F"),
          $fecha->format("Y"),
          $totalImpuestoInc,
          $totalComision,
          $totalLucro,
        );
        array_push($reportesMensuales, $reporteMensual);
      }

      $consultor->reportes=$reportesMensuales;
    }
  }

}
