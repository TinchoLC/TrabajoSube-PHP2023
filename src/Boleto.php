<?php
namespace TrabajoSube;
class Boleto{
  public $texto;
  
  public Function mensaje($tarjeta){
    $this->texto = "Boleto pagado! tu saldo restante es: " . $tarjeta->saldo . " y te quedan " . $tarjeta->plus . " viajes Plus";
    return True;
  }  

  public Function verMensaje(){
    echo $this->texto;
    return $this->texto;
  }
}
