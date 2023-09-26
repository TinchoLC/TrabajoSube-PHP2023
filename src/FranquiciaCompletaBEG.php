<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    public function cuantoDescuento($pagar){
        $marca = $this->timx();
        if (count($this->viajeshoy) > 0) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }

        if(count($this->viajeshoy) > 1)
            return 120;
        else
            return 0; 
      }

      
}
