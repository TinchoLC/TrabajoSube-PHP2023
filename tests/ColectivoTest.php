<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarConDinero() {
        $tarje = new Tarjeta();
        $cole = new Colectivo();
        $this->assertTrue($cole->pagarCon($tarje));
        $this->assertEquals($tarje->verSaldo(),-120);
        $this->assertFalse($cole->pagarCon($tarje)); // Aca tirara falso porque el saldo no puede llegar a -240, el minimo es menor.
        $this->assertEquals($tarje->verSaldo(),-120);
        $parcial = new FranquiciaParcial();
        $this->assertTrue($cole->pagarCon($parcial));
        $this->assertEquals($parcial->verSaldo(),-60);
        $completaJ = new FranquiciaCompletaJUB();
        $this->assertTrue($cole->pagarCon($completaJ));
        $this->assertEquals($completaJ->verSaldo(),0);
        $completaB = new FranquiciaCompletaBEG();
        $this->assertTrue($cole->pagarCon($completaB));
        $this->assertEquals($completaB->verSaldo(),0);
    }
}
