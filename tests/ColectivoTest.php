<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{

    public function testAgregarSaldo(){  
        $tarje = new Tarjeta(100);
        $this->assertEquals($tarje->agregarSaldo(100), 200);
    }
}
