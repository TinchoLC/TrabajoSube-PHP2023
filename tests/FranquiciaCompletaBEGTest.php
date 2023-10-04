<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaBEGTest extends TestCase{

    public function testTerceraVezPaga(){
        $tarje = new FranquiciaCompletaBEG();
        $cole = new Colectivo();

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),0);

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),0);

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),-120);
    }

    public function testDistintosdias(){
        $tarje = new FranquiciaCompletaBEG();
        $cole = new Colectivo();

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),0);

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),0);

        $tarje->agregarTiempoFalso(10000000);
        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),0);
    }

}
