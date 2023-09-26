<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';

  public function descontarSaldo(){ 
    $this->marcaViaje();
    return $this->descuentoSaldo(60);
}
}
