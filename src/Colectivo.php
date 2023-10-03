<?php
namespace TrabajoSube;

class Colectivo{
    public $linea;
    public $precioBoleto = 120;
    
    protected $boolband = false;
    public function __construct($line = "M Verde"){
      $this->linea = $line;
    }

    // Esta funcion sirve para pagar con una tarjeta en especifico, casos explicados en la funcion
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $tarjeta->cuantoDescuento($this->precioBoleto, false)) > $tarjeta->saldoMinimo){ // Si se puede pagar con el saldo actual
            $descontado = $tarjeta->descontarSaldo($this->precioBoleto); 

            if($tarjeta->informeNegativoDeuda) // Si la tarjeta tenia el booleano que informa que salio de negativo como positivo lo pone en falso y pone el del colectivo como positivo
            {
                $this->boolband = true;
                $tarjeta->informeNegativoDeuda = false;
            }
            $boletox = new Boleto($tarjeta->tipo,$tarjeta->id,$this->linea,$descontado,$tarjeta->saldo,$this->boolband);
            $this->boolband = false; // Luego de informarle al boleto deja en falso el booleano  
            return $boletox; // Retorna el boleto generado
        }
        else { // Tu saldo no es suficiente para este viaje
            echo("SALDO INSUFICIENTE");
            return NULL;
        }
    }

}
