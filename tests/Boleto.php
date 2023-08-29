<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function testCargarDinero(){  
        $cole = new Tarjeta(100);
        $this->assertEquals($Tarjeta->agregarSaldo(100), 200);
    }
}
