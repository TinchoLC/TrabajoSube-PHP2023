<?php
namespace TrabajoSube;

class FranquiciaCompletaBEG extends Tarjeta{
    public $tipo = 'FranquiciaBoletoEducativo';

    // Esta funcion informa cuanto debes pagar. Le debes agregar un booleano 
    // para informar si vas a efectuar el pago o solo estas consultando.
    // Ademas, revisa si el dia en el que estas consultando o pagando es el mismo de los que hay registros
    // Si es el mismo no hace nada, si no es el mismo, borra los registros porque entiende que es un nuevo dia.
    public function cuantoDescuento($precio, $pagar){
        $marca = $this->timx();
    
        if(!$this->isDiasCorrecto($marca)){
            return $precio;
        }
    
        if (count($this->viajeshoy) > 0) {
            if(!$this->mismoDia($marca,$this->viajeshoy[0]))
                $this->viajeshoy = [];
        }
    
        if(count($this->viajeshoy) > 1)
            return $precio;
        else
            return 0; 
    }
}
