<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

    public function testMensaje() {
      $boleto = new Boleto();
      $tarjeta = new Tarjeta(0);
      $this->assertTrue($boleto->mensaje($tarjeta));
    }

}
