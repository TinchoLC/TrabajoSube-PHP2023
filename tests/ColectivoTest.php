<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarConDinero() {
        $saldoInicial = 130;
        $tarje = new Tarjeta($saldoInicial);
        $cole = new Colectivo();
        $this->assertTrue($cole->pagarCon($tarje));
        $tarje2 = new Tarjeta();
        $this->assertFalse($cole->pagarCon($tarje2));
    }

    public function testPagarConPlus() {
        $saldoInicial = -200;
        $tarje = new Tarjeta($saldoInicial);
        $cole = new Colectivo();
        $this->assertTrue($cole->pagarCon($tarje));
        $this->assertTrue($cole->pagarCon($tarje));
        $this->assertFalse($cole->pagarCon($tarje));
    }

}
