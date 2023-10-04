<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaJUBTest extends TestCase{
    
    public function testDescontarSaldo(){
        $tarje = new FranquiciaCompletaJUB();
        $tarje->DescontarSaldo(1000);
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->agregarTiempoFalso(10000000);
        $tarje->DescontarSaldo(120);
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}
