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
    public $viajesmes = [];
    public $tiempofalsoagregado = 0;

    public function __construct($sald=0,$idd = 0){
      $this->saldo = $sald;
      $this->id = $idd;
    }

    // Esta funcion agrega saldo a la tarjeta, casos explicados dentro de la funcion
    public function agregarSaldo($agregado){
      if (($agregado >= 150 && $agregado <= 500 && $agregado % 50 == 0) || ($agregado >= 500 && $agregado <= 1500 && $agregado % 100 == 0) || ($agregado >= 1500 && $agregado <= 4000 && $agregado % 500 == 0)){ // Comprueba que el monto a agregar sea un monto valido
        if (($agregado + $this->saldo) > $this->saldoMaximo){ // Comprueba si se superaria el saldo maximo, si es asi carga lo restante en cargapendiente
          $this->cargaPendiente += ($agregado) - ($this->saldoMaximo - $this->saldo);
          $this->saldo = $this->saldoMaximo;
          echo "Agregando " . $agregado . " superarias el limite de saldo ($6600). Asi que tienes " . $this->cargaPendiente . " de carga pendiente.";
          return false;
        }
        else{ // Si el saldo agregado no es superior al maximo:
        if($this->saldo < 0 && $this->saldo + $agregado > 0) // Comprueba si con este saldo agregado la tarjeta sale de saldo negativo
          $this->informeNegativoDeuda = true; // Cambio booleano que luego se utilzara en el boleto para informar
        $this->saldo += $agregado; // Agregar el saldo
        echo "Agregaste " . $agregado . ". Tu nuevo saldo es de: " . $this->saldo;
        return true;
        }
      }
      else{
        echo "La carga que estas intentando no es correcta, las cargas aceptadas son: (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000)";
        return false;
      }
    }

    // Esta funcion sirve simplemente para ver el saldo de la tarjeta
    public function verSaldo(){
      return $this->saldo;
    }

    // Esta funcion descuenta el saldo de la tarjeta, casos explicados dentro de la funcion
    protected function descuentoSaldo($descuento){
        if($this->cargaPendiente > 0){ // Revisa si hay carga pendiente
          if($this->cargaPendiente >= $descuento){ // Si lo descontado es menor a la carga pendiente directamente lo resta de la carga
            $this->cargaPendiente -= $descuento; 
          }
          else { // Si lo descontado es mayor a la carga, elimina la carga pendiente y resta lo sobrante al saldo
            $this->saldo-= ($descuento - $this->cargaPendiente);
            $this->cargaPendiente = 0;
          }
        }
        else{ // El caso normal
          $this->saldo-=$descuento;
        }
      return $descuento;
    }
    
    // Esta funcion descuenta el saldo con la funcion  descuentoSaldo y ademas marca el viaje en los viajes de hoy
    public function descontarSaldo($precio){ 
      $descontado = $this->descuentoSaldo($this->cuantoDescuento($precio,true));
      $this->marcaViaje();
      return $descontado;
    }
    
    // Esta es una funcion basica donde le das 2 resultados de time() y te dice si son el mismo dia
    protected function mismoDia($a,$b){
      return date("l jS \of F Y", $a) == date("l jS \of F Y", $b);
    }
    protected function mismoMes($a, $b){
      return date("F Y", $a) == date("F Y", $b);
    }

    // Esta funcion marca un viaje en los viajes de hoy
    public function marcaViaje(){
      $marca = $this->timx();
      array_push($this->viajeshoy,$marca);
      array_push($this->viajesmes,$marca);
    }

    // Esta funcion informa cuanto debes pagar. Le debes agregar un booleano 
    // para informar si vas a efectuar el pago o solo estas consultando.
    // Ademas, revisa si el dia en el que estas consultando o pagando es el mismo de los que hay registros
    // Si es el mismo no hace nada, si no es el mismo, borra los registros porque entiende que es un nuevo dia.
    public function cuantoDescuento($precio,$pagar){
        $marca = $this->timx();
        if (count($this->viajeshoy) > 0) {
        	if(!$this->mismoDia($marca,$this->viajeshoy[1]))
            	$this->viajeshoy = [];
        }
        if (count($this->viajesmes) > 0) {
            if(!$this->mismoMes($marca,$this->viajesmes[1]))
                $this->viajesmes = [];
        }

        if (count($this->viajesmes) < 29) 
            return $precio;
        else if (count($this->viajesmes) < 79)
            return $precio * 0.8;
        else 
            return $precio * 0.75;
    }

    // Estas 2 funciones son para manejar el tiempo y poder hacer los tests correctamente, no existirian
    // en caso de que esto se aplicara para algo real (la funcion timx() seria reemplazada por time())
    public function agregarTiempoFalso($ag){
      $this->tiempofalsoagregado+=$ag;
    }

    public function timx(){
      return time() + $this->tiempofalsoagregado;
    }

    function IsDiasCorrecto($TiempoActual){
      $DiaActual = date('l',$TiempoActual);
      $TiempoActual = date('h:i:s',$TiempoActual);
      return (($DiaActual != "Saturday" && $DiaActual != "Sunday") && ($TiempoActual >= '06:00:00' && $TiempoActual <= '22:00:00'));
    }

}


