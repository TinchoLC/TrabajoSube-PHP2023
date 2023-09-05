<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{

public function descontarSaldo(){
  $this->saldo-=60;
  return true;
}

}