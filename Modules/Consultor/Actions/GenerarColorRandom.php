<?php

namespace Modules\Consultor\Actions;

class GenerarColorRandom
{

  public static function execute(){

    $colorRandom=''."rgba(".random_int(1, 255).', '.random_int(1, 255).', '.random_int(1, 255). ', 1.0)'.'';

    return $colorRandom;
  }
}
