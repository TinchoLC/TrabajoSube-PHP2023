<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoInterurbanoTest extends TestCase{

    public function testPagarConDinero() {
        $TarjetaInterurbano = new Tarjeta(184);
        $TarjetaInterurbano->SetearTiempoFalsoTests;

        $colectivoInterurbano = new ColectivoInterurbano();
        $colectivoInterurbano->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->verSaldo(),0);

    }
}