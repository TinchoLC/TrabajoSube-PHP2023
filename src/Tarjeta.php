<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public $saldoMinimo = -211.84;
    public $saldoMaximo = 6600;
    public $descuento = 120;
    public $id;
    public $tipo = 'Normal';
    public $informeNegativoDeuda = false;

    public function __construct($sald=0,$idd = 0){
      $this->saldo = $sald;
      $this->id = $idd;
    }

    public function agregarSaldo($agregado){
      if (($agregado + $this->saldo) > $this->saldoMaximo){
        echo "Agregando " . $agregado . " superarias el limite de saldo ($6600). Tu saldo actual es de " . $this->saldo;
        return false;
      } 
      else if (($agregado >= 150 && $agregado <= 500 && $agregado % 50 == 0) || ($agregado >= 500 && $agregado <= 1500 && $agregado % 100 == 0) || ($agregado >= 1500 && $agregado <= 4000 && $agregado % 500 == 0)){

        if($this->saldo < 0 && $this->saldo + $agregado > 0)
          $this->informeNegativoDeuda = true;
        $this->saldo += $agregado;
        echo "Agregaste " . $agregado . ". Tu nuevo saldo es de: " . $this->saldo;



        return true;

      }
      else{
        echo "La carga que estas intentando no es correcta, las cargas aceptadas son: (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000)";
        return false;
      }
    }

    public function verSaldo(){
      return $this->saldo;
    }

    public function descontarSaldo(){
      $this->saldo-=$this->descuento;
      return true;
    }
}


