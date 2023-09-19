<?php 
//100
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{


    public function testVerMensaje() {
      $boleto = new Boleto("Normal",911,"K",120,0,false);
      $this->assertEquals($boleto->verMensaje(), "Abona saldo: 120.");
      $boleto2 = new Boleto("Normal",911,"K",120,0,true);
      $this->assertEquals($boleto2->verMensaje(), "Abona saldo: 120. Se cancela el saldo negativo.");
    }

    public function testDatosBoleto() {
      $tarjeta = new Tarjeta(500,2188);
      $colectivo = new Colectivo('122 Verde');
      $boleto = $colectivo->pagarCon($tarjeta);
      $this->assertEquals(get_class($boleto),"TrabajoSube\Boleto");

      // ver que hacer con fecha
      $this->assertEquals($boleto->tipoTarjeta,"Normal");
      $this->assertEquals($boleto->idTarjeta,2188);
      $this->assertEquals($boleto->lineaColectivo,"122 Verde");
      $this->assertEquals($boleto->abonado,120);
      $this->assertEquals($boleto->saldoTarjeta,380);
      $this->assertEquals($boleto->descripcion,"Abona saldo: 120.");
    }

}
