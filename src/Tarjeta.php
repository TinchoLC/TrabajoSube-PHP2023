<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;

    public $plus;

    public function __construct($sald=0, $plu=2){
      $this->saldo = $sald;
      $this->plus = $plu;
    }

    public function agregarSaldo($agregado){
      if (($agregado + $this->saldo) > 6600){
        echo "Agregando " . $agregado . " superarias el limite de saldo ($6600). Tu saldo actual es de " . $this->saldo;
      } 
      else if (($agregado >= 150 && $agregado <= 500 && $agregado % 50 == 0) || ($agregado >= 500 && $agregado <= 1500 && $agregado % 100 == 0) || ($agregado >= 1500 && $agregado <= 4000 && $agregado % 500 == 0)){
        $this->saldo += $agregado;
        echo "Agregaste " . $agregado . ". Tu nuevo saldo es de: " . $this->saldo;
      }
      else{
        echo "La carga que estas intentando no es correcta, las cargas aceptadas son: (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000)";
      }
    }

    public function verSaldo(){
      return $this->saldo;
    }
}
