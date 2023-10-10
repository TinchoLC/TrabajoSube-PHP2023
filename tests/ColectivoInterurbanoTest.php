<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoInterurbanoTest extends TestCase{

    public function testPagarConDinero() {
        $TarjetaInterurbano = new Tarjeta(184);
        $TarjetaInterurbano->falsearTiempo();

        $colectivoInterurbano = new ColectivoInterurbano();
        $colectivoInterurbano->pagarCon($TarjetaInterurbano);
        $this->assertEquals($TarjetaInterurbano->verSaldo(),0);

    }
}