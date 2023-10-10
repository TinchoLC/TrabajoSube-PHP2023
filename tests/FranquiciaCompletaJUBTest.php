<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaJUBTest extends TestCase{
    
    public function testFueradeHora(){
        $Tarjeta = new FranquiciaCompletaJUB();
        $Colectivo = new Colectivo();
        $Tarjeta->agregarSaldo(4000);

        $Tarjeta->falsearTiempo();
        $Tarjeta->agregarTiempoFalso(54000); // agregado 15 horas, llega a 23:00 y sale del horario
        
        $Colectivo->pagarCon($Tarjeta);
        $this->AssertEquals($Tarjeta->verSaldo(),3880);
    }

    public function testDescontarSaldo(){
        $TarjetaFranquiciaCompletaJUBDescontarSaldo = new FranquiciaCompletaJUB();
        $TarjetaFranquiciaCompletaJUBDescontarSaldo->falsearTiempo();

        $TarjetaFranquiciaCompletaJUBDescontarSaldo->DescontarSaldo(1000);
        $this->AssertEquals($TarjetaFranquiciaCompletaJUBDescontarSaldo->verSaldo(),0);

        $TarjetaFranquiciaCompletaJUBDescontarSaldo->agregarTiempoFalso(90000);
        $TarjetaFranquiciaCompletaJUBDescontarSaldo->DescontarSaldo(120);
        $this->AssertEquals($TarjetaFranquiciaCompletaJUBDescontarSaldo->verSaldo(),0);
    }

}
