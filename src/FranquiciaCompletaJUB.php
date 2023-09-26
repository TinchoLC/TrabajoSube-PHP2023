<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    public function descontarSaldo(){ 
        $this->descuentoSaldo(0);
        $this->marcaViaje();
    }
}
