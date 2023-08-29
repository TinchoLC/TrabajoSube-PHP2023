<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase{

    public function testAgregarSaldo(){  
        $tarje = new Tarjeta(100);
        $this->assertEquals($tarje->agregarSaldo(200), 300);
    }
}
