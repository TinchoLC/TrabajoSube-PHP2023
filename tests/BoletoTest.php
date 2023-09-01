<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function testMensaje() {
      $boleto = new Boleto();
      $tarjeta = new Tarjeta(0);
      $this->assertTrue($boleto->mensaje($tarjeta));
    }

   public function testVerMensaje() {
      $boleto = new Boleto();
      $tarjeta = new Tarjeta(0);
      $this->assertEquals($boleto->verMensaje(),"Boleto pagado! Se descuentan $120, tu saldo restante es: 0");  
    }

}
