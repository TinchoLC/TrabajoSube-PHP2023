<?php
namespace TrabajoSube;
class Tarjeta{
    public $saldo;
    public $saldoMinimo = -211.84;
    public $saldoMaximo = 6600;
    public $id;
    public $tipo = 'Normal';
    public $informeNegativoDeuda = false;
    public $cargaPendiente = 0;
    public $viajeshoy = [];
    public $tiempofalsoagregado = 0;

    public function __construct($sald=0,$idd = 0){
      $this->saldo = $sald;
      $this->id = $idd;
    }

    public function agregarSaldo($agregado){
      if (($agregado >= 150 && $agregado <= 500 && $agregado % 50 == 0) || ($agregado >= 500 && $agregado <= 1500 && $agregado % 100 == 0) || ($agregado >= 1500 && $agregado <= 4000 && $agregado % 500 == 0)){
        if (($agregado + $this->saldo) > $this->saldoMaximo){
          $this->cargaPendiente += ($agregado) - ($this->saldoMaximo - $this->saldo);
          $this->saldo = $this->saldoMaximo;
          echo "Agregando " . $agregado . " superarias el limite de saldo ($6600). Asi que tienes " . $this->cargaPendiente . " de carga pendiente.";
          return false;
        }
        else{
        if($this->saldo < 0 && $this->saldo + $agregado > 0)
          $this->informeNegativoDeuda = true;
        $this->saldo += $agregado;
        echo "Agregaste " . $agregado . ". Tu nuevo saldo es de: " . $this->saldo;
        return true;
        }
      }
      else{
        echo "La carga que estas intentando no es correcta, las cargas aceptadas son: (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000)";
        return false;
      }
    }

    public function verSaldo(){
      return $this->saldo;
    }

     protected function descuentoSaldo($descuento){
        if($this->cargaPendiente > 0){
          if($this->cargaPendiente >= $descuento){
            $this->cargaPendiente -= $descuento; 
          }
          else {
            $this->saldo-= ($descuento - $this->cargaPendiente);
            $this->cargaPendiente = 0;
          }
        }
        else{
          $this->saldo-=$descuento;
        }
      return $descuento;
    }
    
    public function descontarSaldo(){ 
        $this->marcaViaje();
        return $this->descuentoSaldo($this->cuantoDescuento(true));
    }
   
    protected function mismoDia($a,$b){
      return date("l jS \of F Y", $a) == date("l jS \of F Y", $b);
    }
    public function marcaViaje(){
      $marca = $this->timx();
      array_push($this->viajeshoy,$marca);
    }

    public function cuantoDescuento($pagar){
      $marca = $this->timx();
        if (count($this->viajeshoy) > 1) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }
      return 120;
    }

    public function agregarTiempoFalso($ag){
      $this->tiempofalsoagregado+=$ag;
    }
    public function timx(){
      return time() + $this->tiempofalsoagregado;
    }
}


