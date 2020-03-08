<?php

namespace Modules\Consultor\Interfaces;
use Modules\Results\Result;

interface ConsultorServiceInterface{
  public function consultoresActivos():Result;
  public function generarReporteDesempenio($data);
  public function calcularGanancias($data,Result $result);
}
