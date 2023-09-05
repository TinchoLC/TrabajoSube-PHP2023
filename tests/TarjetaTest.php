<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testVerSaldo(){  
        $tarje = new Tarjeta(100);
        $tarje->verSaldo();
        $this->assertEquals($tarje->verSaldo(), 100);
    }

    public function testAgregarSaldoDinero(){  
        $tarje = new Tarjeta(100);
        $tarje->agregarSaldo(200);
        $this->assertEquals($tarje->verSaldo(), 300);
        $tarje2 = new Tarjeta(6500);
        $this->assertFalse($tarje2->agregarSaldo(4000));
        $this->assertFalse($tarje->agregarSaldo(37));
    }

    public function test__construct() {
        $saldoInicial = 50;
        $tarje = new Tarjeta($saldoInicial);
        $this->assertEquals($tarje->verSaldo(), $saldoInicial);
    }

    public function testDescontarSaldo(){
        $tarje = new Tarjeta(120);
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);
    }
    
}
