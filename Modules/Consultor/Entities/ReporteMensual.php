<?php

namespace Modules\Consultor\Entities;
use Illuminate\Database\Eloquent\Model;

class ReporteMensual extends Model
{

  protected $mes;
  protected $anio;
  protected $consultor;
  protected $ganancia;
  protected $valor;
  protected $totalImpuestos;
  protected $costoFijo;
  protected $comision;
  protected $lucro;

  protected $fillable=['mes'];

  public function __construct($valor, $mes, $anio,$totalImpuestos,$totalComision, $totalLucro){
    $this->valor=$valor;
    $this->mes=$mes;
    $this->anio=$anio;
    $this->totalImpuestos=$totalImpuestos;
    $this->comision=$totalComision;
    $this->lucro=$totalLucro;
    $this->calcularGanancia();
  }
  public function getGanancia(){
     return $this->ganancia;
  }
  public function getMes(){
     return $this->mes;
  }
  public function getAnio(){
     return $this->anio;
  }
  public function getValor(){
     dd($this->valor);
     return $this->valor;
  }

  public function calcularGanancia(){
    $this->ganancia=$this->valor-$this->totalImpuestos;
  }

  public function getPeriodo(){
    return $this->mes.' de '. $this->anio;
  }

  public function setCostoFijo($costoFijo){
    $this->costoFijo=$costoFijo;
  }

  public function getComision(){
    return $this->comision;
  }

  public function getLucro(){
    return $this->lucro;
  }

}
