<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaParcialTest extends TestCase{
    
    public function testCincoMinutos(){
        $tarje = new FranquiciaParcial();
        $tarje->agregarSaldo(4000);
        $cole = new Colectivo();

        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),3940);
        $tarje->agregarTiempoFalso(100); // Menos de 5 minutos
        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),3820);
        $tarje->agregarTiempoFalso(1000); // Mas de 5 minutos
        $cole->pagarCon($tarje);
        $this->AssertEquals($tarje->verSaldo(),3760);
    }

    public function testCuatroPordia(){
        $tarje = new FranquiciaParcial();
        $tarje->agregarSaldo(4000);
        $cole = new Colectivo();
        for($i = 0;$i<5;$i++){
            $cole->pagarCon($tarje);
            $tarje->agregarTiempoFalso(1000); // Mas de 5 minutos
        }
        $this->AssertEquals($tarje->verSaldo(),3640); // 4 viajes medioboleto y 1 normal
    }



}