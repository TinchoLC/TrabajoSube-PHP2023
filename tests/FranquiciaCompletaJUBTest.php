<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaJUBTest extends TestCase{
    
    public function testDescontarSaldo(){
        $tarje = new FranquiciaCompletaJUB();
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}
