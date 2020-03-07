<?php

namespace Modules\Consultor\Validators;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Results\Result;

class GananciasInformeValidator
{
  public static function execute($data){
    $result=new Result();

    $messages=[
       'month_to.gte' => 'El mes final debe ser mayor al inicial',
       'year_to.gte' => 'El año final debe ser mayor al inicial',
       'consultores.required' => 'Seleccione al menos un consultor'
    ];

    $validator=Validator::make($data,[
      'consultores'=> ['bail','array','required'],
      'month_from'=> ['integer','required'],
      'year_from'=> ['integer','required'],
      'month_to'=> ['integer','required','gte:month_from'],
      'year_to'=> ['integer','required', 'gte:year_from'],
    ],$messages);

    $result->setStatus('VALIDATED');

    if ($validator->fails()) {
      $result->setAllError($validator->errors());
      $result->addMessage('[ERR_CHECK_DATA] # The form has errors whit the inputs');
      $result->setStatus('ERR_FORM');
      $result->setCode(400);
    }

    return $result;
  }
}
