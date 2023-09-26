<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaBEGTest extends TestCase{

    public function testTerceraVezPaga(){
        $tarje = new FranquiciaCompletaBEG();

        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),-120);


    }

}
