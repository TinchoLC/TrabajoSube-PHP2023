<?php
namespace TrabajoSube;

class Colectivo{
    private $costoBoleto = 120;

    public function pagarCon($tarjeta){

        if (($tarjeta->saldo - $this->costoBoleto) > $tarjeta->saldoMinimo){
            $tarjeta->saldo-=$costoBoleto;
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
