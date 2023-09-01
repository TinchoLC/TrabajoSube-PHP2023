<?php
namespace TrabajoSube;
class Boleto{
  public $texto;
  
  public Function mensaje($tarjeta){
    $this->texto = "Boleto pagado! Se descuentan $120, tu saldo restante es: " . $tarjeta->saldo;
    return True;
  }  

  public Function verMensaje(){
    echo $this->texto;
    return $this->True;
  }
}
