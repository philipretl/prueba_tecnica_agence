<?php

namespace Modules\Consultor\Actions;
use Carbon\Carbon;

class GenerarFecha
{
  public static function execute($mes=1, $anio=2000, $day=1){
    $year = $anio; $month = $mes;
    return Carbon::createFromDate($year, $month, $day);
  }
}
