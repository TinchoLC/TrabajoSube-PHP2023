    public function testPagarCon() {
        $saldoInicial = 130;
        $tarje = new Tarjeta($saldoInicial);
        $cole = new Coletivo();
        $this->assertTrue($cole->pagarCon($tarje));
    }
