<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testVerSaldo(){  
        $tarje = new Tarjeta(100);
        $this->assertEquals($tarje->verSaldo(), 100);
    }

    public function testAgregarSaldo(){  
        $posibles = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
        for ($i = 0; $i < Count($posibles); $i++){
            $tarje = new Tarjeta();
            $this->assertTrue($tarje->agregarSaldo($posibles[$i]));
            $this->assertEquals($tarje->verSaldo(), $posibles[$i]);
        }
        $tarje2 = new Tarjeta(6000);
        $this->assertFalse($tarje2->agregarSaldo(4000));
        $this->assertFalse($tarje2->agregarSaldo(37));
    }

    public function testCargaPendiente(){
        $tarje = new Tarjeta(6000);
        $tarje->agregarSaldo(800);
        $this->assertEquals($tarje->verSaldo(),6600);
        $this->assertEquals($tarje->cargaPendiente,200);

        $cole = new Colectivo('107 Rojo');
        $cole->pagarCon($tarje);
        $this->assertEquals($tarje->verSaldo(),6600);
        $this->assertEquals($tarje->cargaPendiente,80);

        $cole->pagarCon($tarje);
        $this->assertEquals($tarje->verSaldo(),6560);
        $this->assertEquals($tarje->cargaPendiente,0);

    }

    public function test__construct() {
        $saldoInicial = 50;
        $idInicial = 144;
        $tarje = new Tarjeta($saldoInicial,$idInicial);
        $this->assertEquals($tarje->verSaldo(), $saldoInicial);
        $this->assertEquals($tarje->id, $idInicial);
    }

    public function testDescontarSaldo(){
        $tarje = new Tarjeta(120);
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->agregarTiempoFalso(100000);
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),-120);
    }
    
}
