<?php
namespace TrabajoSube;
class Boleto{
  public $texto;
  public $fecha;
  public $tipotarjeta;
  public $idtarjeta;
  public $lineacolectivo;
  public $abonado;
  public $saldotarjeta;
  // public $descr;
  public Function 
  
  public Function mensaje($tarjeta){
    $this->texto = "Boleto pagado! tu saldo restante es: " . $tarjeta->saldo;
    return True;
  }  

  public Function verMensaje(){
    echo $this->texto;
    return $this->texto;
  }
}
