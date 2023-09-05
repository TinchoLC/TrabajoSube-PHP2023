<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaParcialTest extends TestCase{
    
    public function testDescontarSaldo(){
        $tarje = new FranquiciaParcial(60);
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}