<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    // Esta funcion informa cuanto debes pagar. Le debes agregar un booleano 
    // para informar si vas a efectuar el pago o solo estas consultando.
    // Ademas, revisa si el dia en el que estas consultando o pagando es el mismo de los que hay registros
    // Si es el mismo no hace nada, si no es el mismo, borra los registros porque entiende que es un nuevo dia.
    public function cuantoDescuento($precio, $pagar){
        $marca = $this->timx();
        
        if(!$this->isDiasCorrecto($this->timx())){
            return $precio; // si esta fuera del rango de dias paga el boleto completo
        }

        return 0; // En el caso normal no paga boleto
      }
}
