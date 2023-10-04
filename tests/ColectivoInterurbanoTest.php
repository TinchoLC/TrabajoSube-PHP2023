<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoInterurbanoTest extends TestCase{

    public function testPagarConDinero() {
        $tarjeta = new Tarjeta(184);
        $colectivoInterurbano = new ColectivoInterurbano();
        $colectivoInterurbano->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->verSaldo(),0);

    }
}