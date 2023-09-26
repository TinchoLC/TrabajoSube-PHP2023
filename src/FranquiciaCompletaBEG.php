<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    public function cuantoDescuento(){
        $marca = timx();
        if (count($this->viajeshoy) > 1) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }

        if(count($this->viajeshoy) > 3)
            return 120;
        else
            return 0; 
      }

      
}
