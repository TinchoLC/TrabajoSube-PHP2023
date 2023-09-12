<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaBEGTest extends TestCase{
    
    public function testDescontarSaldo(){
        $tarje = new FranquiciaCompletaBEG();
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}
