<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testVerSaldo(){  
        $TarjetaVerSaldo = new Tarjeta(100);
        $TarjetaVerSaldo->SetearTiempoFalsoTests();
        $this->assertEquals($TarjetaVerSaldo->verSaldo(), 100);
    }

    public function testSetearTiempoFalsoTests(){
        $TarjetaSetearTiempoFalso = new Tarjeta();
        $TarjetaSetearTiempoFalso->SetearTiempoFalsoTests();
        $this->assertFalse($TarjetaSetearTiempoFalso->tiemporeal);
    }

    public function testAgregarSaldo(){  
        $ValoresPermitidosDeCarga = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];
        
        for ($PosicionActual = 0; $PosicionActual < Count($ValoresPermitidosDeCarga); $PosicionActual++){
            $TarjetaAgregarSaldoPermitido = new Tarjeta();
            $TarjetaAgregarSaldoPermitido->SetearTiempoFalsoTests();

            $this->assertTrue($TarjetaAgregarSaldoPermitido->agregarSaldo($ValoresPermitidosDeCarga[$PosicionActual]));
            $this->assertEquals($TarjetaAgregarSaldoPermitido->verSaldo(), $ValoresPermitidosDeCarga[$PosicionActual]);
        }
        $TarjetaAgregarSaldoNoPermitido = new Tarjeta(6000);
        $TarjetaAgregarSaldoNoPermitido->SetearTiempoFalsoTests();

        $this->assertFalse($TarjetaAgregarSaldoNoPermitido->agregarSaldo(4000));
        $this->assertFalse($TarjetaAgregarSaldoNoPermitido->agregarSaldo(37));
    }

    public function testCargaPendiente(){
        $TarjetaCargaPendiente = new Tarjeta(6000);
        $TarjetaCargaPendiente->SetearTiempoFalsoTests();
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
        $TarjetaDescontarSaldo->SetearTiempoFalsoTests();
        $TarjetaDescontarSaldo->DescontarSaldo(120);
        $this->AssertEquals($TarjetaDescontarSaldo->verSaldo(),0);

        $TarjetaDescontarSaldo->agregarTiempoFalso(10000000);
        $TarjetaDescontarSaldo->DescontarSaldo(120);
        $this->AssertEquals($TarjetaDescontarSaldo->verSaldo(),-120);
    }

    public function testUsoFrecuenteMensual(){
        $TarjetaUsoFrecuenteMensual = new Tarjeta(10000);
        $TarjetaUsoFrecuenteMensual->SetearTiempoFalsoTests();

        $ColeUsoFrecuenteMensual = new Colectivo('102/144');
        
        $VecesPagadas = 0;
        while ($VecesPagadas < 29){ // primeros 29
            $ColeUsoFrecuenteMensual->pagarCon($TarjetaUsoFrecuenteMensual);
            $VecesPagadas++;
        }
        // 100000 - (120 * 29) = 10000 - 3480 = 6520
        $this->AssertEquals($TarjetaUsoFrecuenteMensual->verSaldo(),6520); 

        while ($VecesPagadas < 79){ // del 30 al 79 (siguientes 50)
            $ColeUsoFrecuenteMensual->pagarCon($TarjetaUsoFrecuenteMensual);
            $VecesPagadas++;
        }
        
        // 6520 - (120 * 0.8 * 50) = 6520 - 4800 = 1720
        $this->AssertEquals($TarjetaUsoFrecuenteMensual->verSaldo(),1720);

        $ColeUsoFrecuenteMensual->pagarCon($TarjetaUsoFrecuenteMensual); // Este boleto al ser el 80 debe tener 25% de descuento
        // 1720 - (120 * 0.75) = 1720 - 90 = 1630
        $this->AssertEquals($TarjetaUsoFrecuenteMensual->verSaldo(),1630);

        $TarjetaUsoFrecuenteMensual->agregarTiempoFalso(115200); // mas de un mes
        $ColeUsoFrecuenteMensual->pagarCon($TarjetaUsoFrecuenteMensual); // boleto sin descuento, el primero del mes
        // 1630 - 120 = 1510
        $this->AssertEquals($TarjetaUsoFrecuenteMensual->verSaldo(),1510);
    }
    
}
