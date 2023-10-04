<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaBEGTest extends TestCase{

    public function testTerceraVezPaga(){
        $TarjetaFranquiciaCompletaBEGPagandoTresVeces = new FranquiciaCompletaBEG();
        $ColectivoFranquiciaCompletaBEGPagandoTresVeces = new Colectivo();

        $ColectivoFranquiciaCompletaBEGPagandoTresVeces->pagarCon($TarjetaFranquiciaCompletaBEGPagandoTresVeces);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPagandoTresVeces->verSaldo(),0);

        $ColectivoFranquiciaCompletaBEGPagandoTresVeces->pagarCon($TarjetaFranquiciaCompletaBEGPagandoTresVeces);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPagandoTresVeces->verSaldo(),0);

        $ColectivoFranquiciaCompletaBEGPagandoTresVeces->pagarCon($TarjetaFranquiciaCompletaBEGPagandoTresVeces);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPagandoTresVeces->verSaldo(),-120);
    }

    public function testDistintosdias(){
        $TarjetaFranquiciaCompletaBEGPDistintosDias = new FranquiciaCompletaBEG();
        $ColectivoFranquiciaCompletaBEGDistintosDias = new Colectivo();

        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);

        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);

        $TarjetaFranquiciaCompletaBEGPDistintosDias->agregarTiempoFalso(10000000);
        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);
    }

}
