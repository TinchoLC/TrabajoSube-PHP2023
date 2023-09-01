<?php
namespace TrabajoSube;

class Colectivo{
    public function pagarCon($tarjeta){
        if ($tarjeta->saldo > 120){
            $tarjeta->saldo-=120;
            $boletox = new Boleto();
            $boletox->mensaje($tarjeta);
            return true;
        } else if ($tarjeta->saldo > -211.84 && $tarjeta->plus > 0) {
                $tarjeta->plus -= 1;
            return true;
        } else {
            return false;
        }
    }

}
