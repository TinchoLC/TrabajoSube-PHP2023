<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
  $boleto = new Boleto();
  $tarjeta = new Tarjeta(0);
  
    public function testMensaje() {
        $this->assertTrue($boleto->mensaje($tarjeta));
    }

   public function testVerMensaje() {
        $this->assertEqual($boleto->verMensaje(),"Boleto pagado! Se descuentan $120, tu saldo restante es: 0");  
    }

}
