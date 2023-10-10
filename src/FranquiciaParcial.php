<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';
  public $medioBoletoPorDia = 0;

  // Esta funcion informa cuanto debes pagar. Le debes agregar un booleano 
    // para informar si vas a efectuar el pago o solo estas consultando.
    // Ademas, revisa si el dia en el que estas consultando o pagando es el mismo de los que hay registros
    // Si es el mismo no hace nada, si no es el mismo, borra los registros porque entiende que es un nuevo dia.
  public function cuantoDescuento($precio, $pagar){
    $marca = $this->timx();

    if(!$this->isDiasCorrecto($this->timx())){
      return $precio; // Si esta fuera del rango de dias del funcionamiento simplemente cobra el boleto completo
    }
    
    if (count($this->viajesHoy) > 0) {
        if(!$this->mismoDia($marca,$this->viajesHoy[0])){
            $this->viajesHoy = [];
            $this->medioBoletoPorDia = 0;
        }
        else{
            if($marca - end($this->viajesHoy) > (5*60) && $this->medioBoletoPorDia<4){ // Si pasaron mas de 5 minutos desde el ultimo medio boleto y hubo menos de 4 hoy
                if ($pagar)
                    $this->medioBoletoPorDia++;
                return $precio / 2; // Paga la mitad del boleto
            }
            else 
                return $precio;
        }
    }
    if ($pagar)
      $this->medioBoletoPorDia++;
    return $precio / 2; // Si hoy todavia no se pago cobra la mitad del boleto
  }
}
