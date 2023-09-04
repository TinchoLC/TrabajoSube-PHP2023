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
      $this->assertEquals($boleto->mensaje($tarjeta), "Boleto pagado! tu saldo restante es: - 120 y te quedan 2 viajes Plus");
    }

}
