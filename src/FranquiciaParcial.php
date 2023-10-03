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
        if (count($this->viajeshoy) > 0) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1])){
            $this->viajeshoy = [];
            $this->medioBoletoPorDia = 0;
          }
          else{
            if($marca - end($this->viajeshoy) > (5*60) && $this->medioBoletoPorDia<4){
              if ($pagar)
                $this->medioBoletoPorDia++;
              return $precio / 2;
            }
            else{ 
              return $precio;
            }
          }
        }
    if ($pagar)
      $this->medioBoletoPorDia++;
    return $precio / 2;
  }
}
