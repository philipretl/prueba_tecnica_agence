<?php

namespace Modules\Consultor\Interfaces;
use Modules\Results\Result;

interface ConsultorServiceInterface{
  public function consultoresActivos():Result;
}
