<?php
namespace TrabajoSube;
class Colectivo2{
    public function pagarCon($tarjeta){
        $tarjeta->saldo-=120;
        $boletox = new Boleto();
        $boletox->mensaje($tarjeta);
    }

class Colectivo{
    protected $linea;
    
    public function __construct($linea){
        $this->linea = $linea;
    }
    
    //    Funcion de ejemplo para test
    public function getLinea(){
        return $this->linea;
    }

}
