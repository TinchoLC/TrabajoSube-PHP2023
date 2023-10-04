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

    public function testDescontarSaldo(){
        $tarje = new Tarjeta(120);
        $tarje->DescontarSaldo(120);
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->agregarTiempoFalso(100000);
        $tarje->DescontarSaldo(120);
        $this->AssertEquals($tarje->verSaldo(),-120);
    }

    public function testUsoFrecuenteMensual(){
        $tarje = new Tarjeta(10000);
        $cole = new Colectivo('102/144');

        for ($i = 0; i < 29; $i++){ // primeros 29
            $cole->pagarCon($tarje);
        }
        // 100000 - (120 * 29) = 10000 - 3480 = 6520
        $this->AssertEquals($tarje->verSaldo(),6520); 

        for ($i = 0; i < 49; $i++){ // del 30 al 79 (siguientes 49)
            $cole->pagarCon($tarje);
        }
        // 6520 - (120 * 0.8 * 49) = 6520 - 4704 = 1816
        $this->AssertEquals($tarje->verSaldo(),1816);

        $cole->pagarCon($tarje); // Este boleto al ser el 80 debe tener 25% de descuento
        // 1816 - (120 * 0.75) = 1816 - 90 = 1726
        $this->AssertEquals($tarje->verSaldo(),1726);

        $tarje->agregarTiempoFalso(10000000); // mas de un mes
        $cole->pagarCon($tarje); // boleto sin descuento, el primero del mes
        // 1726 - 120 = 1606
        $this->AssertEquals($tarje->verSaldo(),1606);
    }
    
}
