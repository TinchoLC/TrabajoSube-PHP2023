<?php
namespace TrabajoSube;

class Colectivo{
    public $linea;
    
    private $boolband = false;
    public function __construct($line = "M Verde"){
      $this->linea = $line;
    }
    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $tarjeta->descuento) > $tarjeta->saldoMinimo){
            $tarjeta->descontarSaldo();
            
            if($tarjeta->informeNegativoDeuda)
            {
                $boolband = true;
                $tarjeta->informeNegativoDeuda = false;
            }
            $boletox = new Boleto($tarjeta->tipo,$tarjeta->id,$this->linea,$tarjeta->descuento,$tarjeta->saldo,$boolband);
            $boolband = false;

            $boletox->mensaje($tarjeta);
            return true;
        }
        else {
            echo("TARJETA SIN SALDO");
            return false;
        }
    }

}
