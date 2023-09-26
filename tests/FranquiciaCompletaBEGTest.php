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

    public function testDistintosdias(){
        $tarje = new FranquiciaCompletaBEG();

        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->agregarTiempoFalso(100000);
        $tarje->DescontarSaldo();
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}
