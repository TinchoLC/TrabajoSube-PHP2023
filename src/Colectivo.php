<?php
namespace TrabajoSube;

class Colectivo{
    public $linea;
    
    protected $boolband = false;
    public function __construct($line = "M Verde"){
      $this->linea = $line;
    }

    // Esta funcion sirve para pagar con una tarjeta en especifico    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $tarjeta->cuantoDescuento(false)) > $tarjeta->saldoMinimo){
            $descontado = $tarjeta->descontarSaldo();

            if($tarjeta->informeNegativoDeuda)
            {
                $this->boolband = true;
                $tarjeta->informeNegativoDeuda = false;
            }
            $boletox = new Boleto($tarjeta->tipo,$tarjeta->id,$this->linea,$descontado,$tarjeta->saldo,$this->boolband);
            $this->boolband = false;
            return $boletox;
        }
        else {
            echo("TARJETA SIN SALDO");
            return NULL;
        }
    }

}
