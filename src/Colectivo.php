<?php
namespace TrabajoSube;

class Colectivo{
    public $linea;
    
    public function __construct($line = "M Verde"){
      $this->linea = $line;
    }
    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $tarjeta->descuento) > $tarjeta->saldoMinimo){
            $tarjeta->descontarSaldo();
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        }
        else {
            echo("TARJETA SIN SALDO");
            return false;
        }
    }

}
