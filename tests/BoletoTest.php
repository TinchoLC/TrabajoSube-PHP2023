<?php 
//100
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
      $boleto->mensaje($tarjeta);
      $this->assertEquals($boleto->verMensaje(), "Boleto pagado! tu saldo restante es: 0 y te quedan 2 viajes Plus");
    }

}
