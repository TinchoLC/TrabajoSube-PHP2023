<?php 
//100
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{


    public function testVerMensaje() {
      $BoletoQueNOTeniaSaldoNegativo = new Boleto("Normal",911,"K",120,0,false);
      $this->assertEquals($BoletoQueNoTeniaSaldoNegativo->verMensaje(), "Abona saldo: 120.");
      $BoletoQueSITeniaSaldoNegativo = new Boleto("Normal",911,"K",120,0,true);
      $this->assertEquals($BoletoQueSITeniaSaldoNegativo->verMensaje(), "Abona saldo: 120. Se cancela el saldo negativo.");
    }

    public function testDatosBoleto() {
      $TarjetaDatosBoleto = new Tarjeta(500,2188);
      $ColectivoDatosBoleto = new Colectivo('122 Verde');
      $BoletoDeDondeSacarLosDatos = $ColectivoDatosBoleto->pagarCon($TarjetaDatosBoleto);
      $this->assertEquals(get_class($BoletoDeDondeSacarLosDatos),"TrabajoSube\Boleto");

      // ver que hacer con fecha
      $this->assertEquals($BoletoDeDondeSacarLosDatos->tipoTarjeta,"Normal");
      $this->assertEquals($BoletoDeDondeSacarLosDatos->idTarjeta,2188);
      $this->assertEquals($BoletoDeDondeSacarLosDatos->lineaColectivo,"122 Verde");
      $this->assertEquals($BoletoDeDondeSacarLosDatos->abonado,120);
      $this->assertEquals($BoletoDeDondeSacarLosDatos->saldoTarjeta,380);
      $this->assertEquals($BoletoDeDondeSacarLosDatos->descripcion,"Abona saldo: 120.");
    }

    public function testInformeNegativo(){
      $TarjetaConSaldoNegativo = new Tarjeta(-100,1000);
      $ColectivoInformeNegativo = new Colectivo('Expreso Andino');
      $TarjetaConSaldoNegativo->agregarSaldo(500);
      $BoletoInformeNegativo = $ColectivoInformeNegativo->pagarCon($TarjetaConSaldoNegativo);
      $this->assertEquals(get_class($BoletoInformeNegativo),"TrabajoSube\Boleto");

        // ver que hacer con fecha
      $this->assertEquals($TarjetaConSaldoNegativo->tipoTarjeta,"Normal");
      $this->assertEquals($TarjetaConSaldoNegativo->idTarjeta,1000);
      $this->assertEquals($TarjetaConSaldoNegativo->lineaColectivo,"Expreso Andino");
      $this->assertEquals($TarjetaConSaldoNegativo->abonado,120);
      $this->assertEquals($TarjetaConSaldoNegativo->saldoTarjeta,280);
      $this->assertEquals($TarjetaConSaldoNegativo->descripcion,"Abona saldo: 120. Se cancela el saldo negativo.");
    }

}
