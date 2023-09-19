<?php
namespace TrabajoSube;

class Colectivo{
    public $linea;
    
    protected $boolband = false;
    public function __construct($line = "M Verde"){
      $this->linea = $line;
    }
    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $tarjeta->descuento) > $tarjeta->saldoMinimo){
            $tarjeta->descontarSaldo();

            if($tarjeta->informeNegativoDeuda)
            {
                $this->boolband = true;
                $tarjeta->informeNegativoDeuda = false;
            }
            $boletox = new Boleto($tarjeta->tipo,$tarjeta->id,$this->linea,$tarjeta->descuento,$tarjeta->saldo,$this->boolband);
            $this->boolband = false;
            return $boletox;
        }
        else {
            echo("TARJETA SIN SALDO");
            return NULL;
        }
    }

}
