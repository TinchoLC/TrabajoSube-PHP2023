<?php
namespace TrabajoSube;

class Colectivo2{
    public function pagarCon($tarjeta){
        if ($tarjeta->saldo < 120){
            $tarjeta->saldo-=120;
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        } else {
            return false;
        }
    }

}
