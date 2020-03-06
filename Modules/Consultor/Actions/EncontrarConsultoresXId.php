<?php

namespace Modules\Consultor\Actions;
use Modules\Results\Result;
use Modules\Consultor\Entities\Usuario;

class EncontrarConsultoresXid{

    public static function execute($data,$result):Result{
      $consultores = Usuario::whereIn('co_usuario',$data['consultores'])->get();
      if($consultores->isEmpty()){
        $result->setStatus('EMPTY');
        $result->addMessage('[EMPTY_DATA] # Empty data from resource requested');
        $result->setCode(200);
      }
      else{
        $result->setStatus('SUCCESS');
        $result->addData('consultores', $consultores);
        $result->addMessage('[LIST_DATA] # List Data from resource requested');
        $result->addMessage('[LIST_DATA_PAGINATED] # List Data paginated from resource requested');
      }
      return $result;
    }
}
