<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';

  public function cuantoDescuento(){
    return 60;
  }
}
