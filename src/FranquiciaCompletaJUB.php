<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    public function cuantoDescuento(){
        return 0;
      }
}
