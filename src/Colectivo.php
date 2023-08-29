<?php
namespace TrabajoSube;
class Colectivo{
    public function pagarCon($tarjeta){
        $tarjeta->saldo-=120;
        $boletox = new Boleto();
        $boletox->mensaje($tarjeta);
    }
}
