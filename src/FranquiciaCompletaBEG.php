<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    public function descontarSaldo(){ 
        if ($this->marcaViaje() > 2)
            $this->descuentoSaldo(120);
        else 
            $this->descuentoSaldo(0);
        
    }
}
