<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';
  
  public function descontarSaldo(){ 
    $this->descuentoSaldo(60);
    $this->marcaViaje();
}
}
