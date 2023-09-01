<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarCon() {
        $saldoInicial = 130;
        $tarje = new Tarjeta($saldoInicial);
        $cole = new Coletivo();
        $this->assertTrue($cole->pagarCon($tarje));
    }

}
