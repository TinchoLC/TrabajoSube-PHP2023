<?php
namespace TrabajoSube;

class Colectivo2{
    public function pagarCon($tarjeta){
        $tarjeta->saldo-=120;
        $boletox = new Boleto();
        $boletox->mensaje($tarjeta);
    }

}
