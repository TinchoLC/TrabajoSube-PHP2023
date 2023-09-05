<?php
namespace TrabajoSube;

class Colectivo{

    public function pagarCon($tarjeta){

        if (($tarjeta->saldo - $this->costoBoleto) > $tarjeta->saldoMinimo){
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
