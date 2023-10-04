<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testVerSaldo(){  
        $TarjetaVerSaldo = new Tarjeta(100);
        $this->assertEquals($TarjetaVerSaldo->verSaldo(), 100);
    }

    public function testAgregarSaldo(){  
        $ValoresPermitidosDeCarga = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
        for ($PosicionActual = 0; $PosicionActual < Count($ValoresPermitidosDeCarga); $PosicionActual++){
            $TarjetaAgregarSaldoPermitido = new Tarjeta();
            $this->assertTrue($TarjetaAgregarSaldoPermitido->agregarSaldo($ValoresPermitidosDeCarga[$PosicionActual]));
            $this->assertEquals($TarjetaAgregarSaldoPermitido->verSaldo(), $ValoresPermitidosDeCarga[$PosicionActual]);
        }
        $TarjetaAgregarSaldoNoPermitido = new Tarjeta(6000);
        $this->assertFalse($TarjetaAgregarSaldoNoPermitido->agregarSaldo(4000));
        $this->assertFalse($TarjetaAgregarSaldoNoPermitido->agregarSaldo(37));
    }

    public function testCargaPendiente(){
        $TarjetaCargaPendiente = new Tarjeta(6000);
        $TarjetaCargaPendiente->agregarSaldo(800);
        $this->assertEquals($TarjetaCargaPendiente->verSaldo(),6600);
        $this->assertEquals($TarjetaCargaPendiente->cargaPendiente,200);

        $ColectivoCargaPendiente = new Colectivo('107 Rojo');
        $ColectivoCargaPendiente->pagarCon($TarjetaCargaPendiente);
        $this->assertEquals($TarjetaCargaPendiente->verSaldo(),6600);
        $this->assertEquals($TarjetaCargaPendiente->cargaPendiente,80);

        $ColectivoCargaPendiente->pagarCon($TarjetaCargaPendiente);
        $this->assertEquals($TarjetaCargaPendiente->verSaldo(),6560);
        $this->assertEquals($TarjetaCargaPendiente->cargaPendiente,0);

    }

    public function testDescontarSaldo(){
        $TarjetaDescontarSaldo = new Tarjeta(120);
        $TarjetaDescontarSaldo->DescontarSaldo(120);
        $this->AssertEquals($TarjetaDescontarSaldo->verSaldo(),0);

        $TarjetaDescontarSaldo->agregarTiempoFalso(10000000);
        $TarjetaDescontarSaldo->DescontarSaldo(120);
        $this->AssertEquals($TarjetaDescontarSaldo->verSaldo(),-120);
    }
    
}
