<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaParcialTest extends TestCase{
    
    public function testCincoMinutos(){
        $TarjetaFranquiciaParcialPasadosCincoMinutos = new FranquiciaParcial();
        $TarjetaFranquiciaParcialPasadosCincoMinutos->SetearTiempoFalsoTests();
        $TarjetaFranquiciaParcialPasadosCincoMinutos->agregarSaldo(4000);
        $ColectivoCincoMinutos = new Colectivo();

        $ColectivoCincoMinutos->pagarCon($TarjetaFranquiciaParcialPasadosCincoMinutos);
        $this->AssertEquals($TarjetaFranquiciaParcialPasadosCincoMinutos->verSaldo(),3940);

        $TarjetaFranquiciaParcialPasadosCincoMinutos->agregarTiempoFalso(100); // Menos de 5 minutos
        $ColectivoCincoMinutos->pagarCon($TarjetaFranquiciaParcialPasadosCincoMinutos);
        $this->AssertEquals($TarjetaFranquiciaParcialPasadosCincoMinutos->verSaldo(),3820);

        $TarjetaFranquiciaParcialPasadosCincoMinutos->agregarTiempoFalso(1000); // Mas de 5 minutos
        $ColectivoCincoMinutos->pagarCon($TarjetaFranquiciaParcialPasadosCincoMinutos);
        $this->AssertEquals($TarjetaFranquiciaParcialPasadosCincoMinutos->verSaldo(),3760);
    }

    public function testPagarHastaCuatroVecesAntesDeCobrarBoletoNormal(){
        $TajertoFranquiciaParcialPagarHastaCuatroVeces = new FranquiciaParcial();
        $TajertoFranquiciaParcialPagarHastaCuatroVeces->SetearTiempoFalsoTests();
        $TajertoFranquiciaParcialPagarHastaCuatroVeces->agregarSaldo(4000);

        $ColectivoPagarHastaCuatroVeces = new Colectivo();

        $VecesQuePagamos = 0;
        while($VecesQuePagamos<5){
            $ColectivoPagarHastaCuatroVeces->pagarCon($TajertoFranquiciaParcialPagarHastaCuatroVeces);
            $TajertoFranquiciaParcialPagarHastaCuatroVeces->agregarTiempoFalso(1000); // Mas de 5 minutos
            $VecesQuePagamos++;
        }
        $this->AssertEquals($TajertoFranquiciaParcialPagarHastaCuatroVeces->verSaldo(),3640); // 4 viajes medioboleto y 1 normal

        $TajertoFranquiciaParcialPagarHastaCuatroVeces->agregarTiempoFalso(90000);
        $ColectivoPagarHastaCuatroVeces->pagarCon($TajertoFranquiciaParcialPagarHastaCuatroVeces);
        $this->AssertEquals($TajertoFranquiciaParcialPagarHastaCuatroVeces->verSaldo(),3580);

    }

}
