<?php
namespace TrabajoSube;

class Colectivo{
    private $costoBoleto = 120;

    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $costoBoleto) > $tarjeta->saldoMinimo){
            $tarjeta->saldo-=costoBoleto;
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        }
        else if ($tarjeta->plus > 0){
            $tarjeta->plus--;
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        } 
        else {
            return false;
        }
    }

}
