<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    public function descontarSaldo(){ 
        if ($this->marcaViaje() > 2)
            return $this->descuentoSaldo(120);
        else 
            return $this->descuentoSaldo(0);
        
    }
}
