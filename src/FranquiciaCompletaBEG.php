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
            return $precio; // Si esta fuera del rango de dias paga boleto completo
        }
    
        if (count($this->viajesHoy) > 0) {
            if(!$this->mismoDia($marca,$this->viajesHoy[0]))
                $this->viajesHoy = [];
        }
    
        if(count($this->viajesHoy) > 1)
            return $precio; // Si ya pago 2 o mas boletos hoy se paga normalmente
        else
            return 0; // No se paga el boleto ya que se utiliza el boleto gratuito
    }
}
