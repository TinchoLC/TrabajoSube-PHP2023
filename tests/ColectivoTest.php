<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarConDinero() {
        $saldoInicial = 130;
        $tarje = new Tarjeta($saldoInicial,0);
        $cole = new Colectivo();
        $this->assertTrue($cole->pagarCon($tarje));
        $tarje2 = new Tarjeta(-200,0);
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
