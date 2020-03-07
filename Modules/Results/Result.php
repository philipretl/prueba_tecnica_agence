<?php

namespace Modules\Results;


use Modules\Results\Message;
use Modules\Results\ErrorApi;

class Result
{
   protected $status;
   protected $data;
   protected $messages;
   protected $errors;
   protected $type;

   public function __construct($type='web')
   {
      $this->data=array();
      $this->errors=array();
      $this->status='SUCCESS';
      $this->messages=array();
      $this->code=200;
      $this->type=$type;
   }

   public function setStatus($status){
       $this->status=$status;
   }
   public function getStatus(){
       return $this->status;
   }

   public function setCode($code){
       $this->code=$code;
   }

   public function getCode(){
       return $this->code;
   }

   public function addData($key, $value){
       $this->data[$key]=$value;
   }
   public function getData($key){
       return $this->data[$key];
   }
   public function getDataAll(){
       return $this->data;
   }

   /**
   * Working in personalice methods of errors and messages v 0.1
   */

   public function addError($value){

     if ($this->type=='api') {
       $error = new ErrorApi($value);
       array_push($this->errors,$error);
     }
     if ($this->type=='web') {
       dd($value);
       array_push($this->errors,$value);
     }


   }
   public function getError($key){
       return $this->data[$key];
   }
   public function getAllError(){
       return $this->errors;
   }
   public function setAllError($errors){
     if ($this->type=='api') {
       foreach ($errors->all() as $error) {
         $this->addError($error);
       }
    }
    if ($this->type=='web') {
      $this->errors=$errors;
    }

   }

  public function addMessage($value){
    $message = new Message($value);

    if (!(in_array($message,$this->messages))){
      array_push($this->messages,$message);
    }
  }
    public function getMessage($position){
        return $this->messages[$position];
    }

    public function findMessage($message):Bool{
        foreach ($this->messages as $messageInstance) {
          if($message==$messageInstance->getCodeMessage()){
            return true;
          }
        }
        return false;
    }

    public function getAllMessage(){
        return $this->messages;
    }

    public function setAllMessage($messages){
        return $this->messages=$messages;
    }
    public function getType(){
      return $this->type;
    }

}
