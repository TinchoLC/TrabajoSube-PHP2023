<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaJUBTest extends TestCase{
    
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
