<?php
namespace TrabajoSube;
class Boleto{
  public Function mensaje($tarjeta){
    echo "Boleto pagado! Se descuentan $120, tu saldo restante es:" . $tarjeta->saldo;
  }  
}
