<?php
namespace TrabajoSube;
class Boleto{
  public $fecha;
  public $tipoTarjeta;
  public $idTarjeta;
  public $lineaColectivo;
  public $abonado;
  public $saldoTarjeta;
  public $descripcion;
  
  public Function __construct($ttarjet,$itarjet,$lcole,$ab,$sald,$bb = false){
    $this->fecha = date('l jS \of F Y h:i:s A');
    $this->$tipoTarjeta = $ttarjet;
    $this->idTarjeta = $itarjet;
    $this->lineaColectivo = $lcole;
    $this->abonado = $ab;
    $this->saldoTarjeta = $sald;

    $this->descripcion = 'Abona saldo: ' . $ab . '.';
    if($bb)
      $this->descripcion = $this->descripcion . ' Se cancela el saldo negativo.';
  }

  public Function verMensaje(){
    echo $this->descripcion;
    return $this->descripcion;
  }
}
