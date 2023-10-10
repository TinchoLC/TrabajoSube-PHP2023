<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarConDinero() {
        $tarjetaConMenorValor = new Tarjeta();
        $tarjetaConMenorValor->falsearTiempo();

        $colectivoUsadoParaLasDistintiasTarjetas = new Colectivo();
        
        $this->assertEquals(get_class($colectivoUsadoParaLasDistintiasTarjetas->pagarCon($tarjetaConMenorValor)),get_class(new Boleto()));
        $this->assertEquals($tarjetaConMenorValor->verSaldo(),-120);
        $this->assertEquals($colectivoUsadoParaLasDistintiasTarjetas->pagarCon($tarjetaConMenorValor),NULL); // el saldo no puede llegar a -240, el minimo es menor.
        $this->assertEquals($tarjetaConMenorValor->verSaldo(),-120);
        
        $tarjetaFranquiciaParcial = new FranquiciaParcial();
        $tarjetaFranquiciaParcial->falsearTiempo();
        $colectivoUsadoParaLasDistintiasTarjetas->pagarCon($tarjetaFranquiciaParcial);
        $this->assertEquals($tarjetaFranquiciaParcial->verSaldo(),-60);

        $tarjetaFranquiciaCompletaJUB = new FranquiciaCompletaJUB();
        $tarjetaFranquiciaCompletaJUB->falsearTiempo();
        $colectivoUsadoParaLasDistintiasTarjetas->pagarCon($tarjetaFranquiciaCompletaJUB);
        $this->assertEquals($tarjetaFranquiciaCompletaJUB->verSaldo(),0);

        $tarjetaFranquiciaCompletaBEG = new FranquiciaCompletaBEG();
        $tarjetaFranquiciaCompletaBEG->falsearTiempo();
        $colectivoUsadoParaLasDistintiasTarjetas->pagarCon($tarjetaFranquiciaCompletaBEG);
        $this->assertEquals($tarjetaFranquiciaCompletaBEG->verSaldo(),0);
    }
}
