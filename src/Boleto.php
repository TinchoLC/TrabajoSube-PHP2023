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
  public $descripcion;
  
  public Function __construct($ttarjet = '',$itarjet = '',$lcole = '',$ab = 120,$sald = 0,$desc = ''){
    $this->fecha = date('l jS \of F Y h:i:s A');
    $this->$tipotarjeta = $ttarjet;
    $this->idtarjeta = $itarjet;
    $this->lineacolectivo = $lcole;
    $this->abonado = $ab;
    $this->saldotarjeta = $sald;
    $this->descripcion = $desc;
  }

  public Function mensaje($tarjeta){
    $this->texto = "Boleto pagado! tu saldo restante es: " . $tarjeta->saldo;
    return True;
  }  

  public Function verMensaje(){
    echo $this->texto;
    return $this->texto;
  }
}
