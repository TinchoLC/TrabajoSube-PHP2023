<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends TestCase{
    
    public function testDescontarSaldo(){
        $tarje = new FranquiciaCompleta();
        $tarje->DescontarSaldo();
        this->AssertEquals($tarje->verSaldo(),0)
    }

}
