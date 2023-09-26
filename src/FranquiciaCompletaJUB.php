<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    public function cuantoDescuento($pagar){
        $marca = $this->timx();
        if (count($this->viajeshoy) > 0) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }

        return 0;
      }
}
