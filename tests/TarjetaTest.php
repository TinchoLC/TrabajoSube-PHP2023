<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testVerSaldo(){  
        $tarje = new Tarjeta(100);
        $tarje->verSaldo();
        $this->assertEquals($tarje->verSaldo(), 100);
    }

    public function testAgregarSaldo(){  
        $tarje = new Tarjeta(100);
        $tarje->agregarSaldo(200);
        $this->assertEquals($tarje->verSaldo(), 300);
        $tarje2 = new Tarjeta(7000);
        $this->assertFalse($tarje2->agregarSaldo(200));
        $this->assertFalse($tarje->agregarSaldo(37));
    }

    public function test__construct() {
        $saldoInicial = 50;
        $tarje = new Tarjeta($saldoInicial);
        $this->assertEquals($tarje->verSaldo(), $saldoInicial);
    }
    
}
