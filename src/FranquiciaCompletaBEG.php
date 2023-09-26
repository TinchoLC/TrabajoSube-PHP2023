<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    public function cuantoDescuento(){
        $marca = time();
        if (count($this->viajeshoy) > 0 && !$this->mismoDia($marca,$this->viajeshoy[1]))
            $this->viajeshoy = [];

        if(count($this->viajeshoy) > 2)
            return 120;
        else
            return 0; 
      }

      
}
