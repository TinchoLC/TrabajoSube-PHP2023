<?php
namespace TrabajoSube;
class Boleto{
  public $fecha;
  public $tipotarjeta;
  public $idtarjeta;
  public $lineacolectivo;
  public $abonado;
  public $saldotarjeta;
  public $descripcion;
  
  public Function __construct($ttarjet = '',$itarjet = '',$lcole = '',$ab = 120,$sald = 0,$bb = false){
    $this->fecha = date('l jS \of F Y h:i:s A');
    $this->$tipotarjeta = $ttarjet;
    $this->idtarjeta = $itarjet;
    $this->lineacolectivo = $lcole;
    $this->abonado = $ab;
    $this->saldotarjeta = $sald;

    $this->descripcion = 'Abona saldo: ' . $ab . '.';
    if($bb)
      $this->descripcion += ' Se cancela el saldo negativo';
  }

  public Function verMensaje(){
    echo $this->descripcion;
    return $this->descripcion;
  }
}
