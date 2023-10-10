<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaBEGTest extends TestCase{

    public function testFueradeHora(){
        $Tarjeta = new FranquiciaCompletaBEG();
        $Colectivo = new Colectivo();
        $Tarjeta->agregarSaldo(4000);
        $Colectivo->pagarCon($Tarjeta);
        $this->AssertEquals($Tarjeta->verSaldo(),3880);
    }

    public function testTerceraVezPaga(){
        $TarjetaFranquiciaCompletaBEGPagandoTresVeces = new FranquiciaCompletaBEG();
        $TarjetaFranquiciaCompletaBEGPagandoTresVeces->falsearTiempo();

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
        $TarjetaFranquiciaCompletaBEGPDistintosDias->falsearTiempo();

        $ColectivoFranquiciaCompletaBEGDistintosDias = new Colectivo();

        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);

        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);

        $TarjetaFranquiciaCompletaBEGPDistintosDias->agregarTiempoFalso(90000);
        $ColectivoFranquiciaCompletaBEGDistintosDias->pagarCon($TarjetaFranquiciaCompletaBEGPDistintosDias);
        $this->AssertEquals($TarjetaFranquiciaCompletaBEGPDistintosDias->verSaldo(),0);
    }

}
