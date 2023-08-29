<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testAgregarSaldo(){  
        $tarje = new Tarjeta(100);
        $tarje->agregarSaldo(200);
        $this->assertEquals($tarje->verSaldo(), 300);
    }
}
