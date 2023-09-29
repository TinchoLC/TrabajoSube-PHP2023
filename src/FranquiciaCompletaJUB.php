<?php
namespace TrabajoSube;

class FranquiciaCompletaJUB extends Tarjeta{
    public $tipo = 'FranquiciaJubilados';

    // Esta funcion informa cuanto debes pagar. Le debes agregar un booleano 
    // para informar si vas a efectuar el pago o solo estas consultando.
    // Ademas, revisa si el dia en el que estas consultando o pagando es el mismo de los que hay registros
    // Si es el mismo no hace nada, si no es el mismo, borra los registros porque entiende que es un nuevo dia.
    public function cuantoDescuento($pagar){
        $marca = $this->timx();
        if (count($this->viajeshoy) > 0) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }

        return 0;
      }
}
