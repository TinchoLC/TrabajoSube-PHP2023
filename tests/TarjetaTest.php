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
        $tarje2 = new Tarjeta(6000);
        $this->assertFalse($tarje2->agregarSaldo(4000));
        $this->assertFalse($tarje->agregarSaldo(37));
    }

    public function testAgregarSaldoPlus(){  
        $tarje = new Tarjeta(0,1);
        $tarje2 = new Tarjeta(0,0);
        $tarje->agregarSaldo(200);
        $this->assertEquals($tarje->verSaldo(), 80);
        $this->assertEquals($tarje->plus, 2);
        $tarje2->agregarSaldo(400);
        $this->assertEquals($tarje2->verSaldo(), 160);
        $this->assertEquals($tarje2->plus, 2);
    }

    public function test__construct() {
        $saldoInicial = 50;
        $tarje = new Tarjeta($saldoInicial);
        $this->assertEquals($tarje->verSaldo(), $saldoInicial);
    }
    
}
