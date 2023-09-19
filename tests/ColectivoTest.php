<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
    
    public function testPagarConDinero() {
        $tarje = new Tarjeta();
        $cole = new Colectivo();
        $this->assertEquals(get_class($cole->pagarCon($tarje)),get_class(new Boleto()));
        $this->assertEquals($tarje->verSaldo(),-120);
        $this->assertEquals($cole->pagarCon($tarje),NULL); // el saldo no puede llegar a -240, el minimo es menor.
        $this->assertEquals($tarje->verSaldo(),-120);
        
        $parcial = new FranquiciaParcial();
        $cole->pagarCon($parcial);
        $this->assertEquals($parcial->verSaldo(),-60);

        $completaJ = new FranquiciaCompletaJUB();
        $cole->pagarCon($completaJ);
        $this->assertEquals($completaJ->verSaldo(),0);

        $completaB = new FranquiciaCompletaBEG();
        $cole->pagarCon($completaB);
        $this->assertEquals($completaB->verSaldo(),0);
    }
}
