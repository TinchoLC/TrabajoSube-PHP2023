<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    public function cuantoDescuento(){
        $marca = timx();
        if (count($this->viajeshoy) > 1) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }

        return 0;
      }
}
