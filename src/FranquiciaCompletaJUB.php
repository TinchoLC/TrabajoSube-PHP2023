<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    public function descontarSaldo(){ 
        $this->marcaViaje();
        return $this->descuentoSaldo(0);
    }
}
