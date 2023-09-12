<?php 
//100
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{


    public function testVerMensaje() {
      $boleto = new Boleto("Normal",911,"K",120,0,false);
      $this->assertEquals($boleto->verMensaje(), "Abona saldo: 120.");
    }

}
