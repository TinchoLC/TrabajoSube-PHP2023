<?php
namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
  public $tipo = 'FranquiciaParcial';
  public $medioBoletoPorDia = 0;

  public function cuantoDescuento(){
    $marca = $this->timx();
        if (count($this->viajeshoy) > 1) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1])){
            $this->viajeshoy = [];
            $this->medioBoletoPorDia = 0;
          }
          else{
            if($marca - end($this->viajeshoy) > (5*60)){
              $this->medioBoletoPorDia++;
              return 60;
            }
            else{ 
              return 120;
            }
          }
        }
    $this->medioBoletoPorDia++;
    return 60;
  }
}
