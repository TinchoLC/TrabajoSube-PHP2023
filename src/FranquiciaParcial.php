<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';

  public function cuantoDescuento(){
    $marca = timx();
        if (count($this->viajeshoy) > 1) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }
    
    return 60;
  }
}
