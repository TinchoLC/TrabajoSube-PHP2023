<?php
namespace TrabajoSube;

class Colectivo{
    public function pagarCon($tarjeta){
        if ($tarjeta->saldo > 120){
            $tarjeta->descontarSaldo();
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        } 
        else {
            return false;
        }
    }

}
