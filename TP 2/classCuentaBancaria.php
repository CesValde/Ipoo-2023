<?php 

    class CuentaBancaria {
        private $nroCuenta ; 
        private $persona ; 
        private $saldoActual ; 
        private $interesAnual ; 

        public function __construct(
            $nroCuenta, 
            $persona, 
            $saldoActual, 
            $interesAnual, 
        ) {
            $this -> nroCuenta = $nroCuenta ; 
            $this -> persona = $persona ; 
            $this -> saldoActual = $saldoActual ;
            $this -> interesAnual = $interesAnual ; 
        }

        public function getNroCuenta() {
            return $this -> nroCuenta ;
        }
        public function get() {
            return $this ->  ; 
        }
        public function getSaldoActual() {
            return $this -> saldoActual ; 
        }
        public function getInteresAnual() {
            return $this -> interesAnual ; 
        }
        public function setNroCuenta($nroCuenta) {
            $this -> nroCuenta = $nroCuenta ; 
        }
        public function set($) {
            $this ->  = $ ; 
        }
        public function setSaldoActual($saldoActual) {
            $this -> saldoActual = $saldoActual ; 
        }
        public function setInteresAnual($interesAnual) {
            $this -> interesAnual = $interesAnual ; 
        }

        public function actualizarSaldo() {
            $saldoActual = $this -> getSaldoActual() ; 
            $interesAnual = $this -> getInteresAnual() ; 
            $saldoActual = $saldoActual + ($interesAnual / 365) ; 

            return $saldoActual ; 
        }

        public function depositar($cantidad) {
            $saldoActual = $this -> getSaldoActual() ; 
            $saldoActual = $saldoActual + $cantidad ; 
            $this -> setSaldoActual($saldoActual) ; 
            return $cantidad ; 
        }

        public function retirar($cantidad) {
            $saldoActual = $this -> getSaldoActual() ; 
                if($saldoActual == 0) {
                    echo "No tiene saldo disponible en su cuenta" ;
                    $cantidad = 0 ;      
                } elseif($saldoActual > 0) {
                    while($cantidad > $saldoActual) {
                        echo "No tiene la cantidad suficiente en su cuenta \n" ; 
                        echo "Ingrese cantidad de dinero a retirar: " ; 
                        $cantidad = trim(fgets(STDIN)) ;
                        // $saldoActual = $saldoActual - $cantidad ; 
                        // return $this -> setSaldoActual($saldoActual) ;           // actualizar saldo actual 
                    }
                }
            return $cantidad ; 
        }
    }

    // 100 / 50 

    /* Programa Banco */
    //
    //

    // parametros class CuentaBancaria
    echo "Ingrese nro de cuenta: " ; 
    $nroCuenta = trim(fgets(STDIN)) ; 
    echo "Ingrese su dni: " ; 
    $dniCliente = trim(fgets(STDIN)) ; 
    echo "Ingrese su saldo actual: " ; 
    $saldoActual = trim(fgets(STDIN)) ; 
    echo "Ingrese interes anual: " ; 
    $interesAnual = trim(fgets(STDIN)) ; 


    // funcion Actualizar saldo 
    $saldoActuali = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ; 
    $verSaldoActuali = $saldoActuali -> actualizarSaldo() ; 
    echo $verSaldoActuali . "\n" ; 


    // funcion depositar
    echo "Ingrese cantidad de dinero a ingresar: " ; 
    $cantidad = trim(fgets(STDIN)) ; 

    $deposito = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ;     
    $saldo = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ;      
    $verDeposito = $deposito -> depositar($cantidad) ; 
    $saldoDispo = $saldo -> getSaldoActual() ; 
    echo "Ha depositado $$verDeposito ars a su cuenta. Saldo disponible en su cuenta: $saldoDispo" ; 


/* funcion retirar
    echo "Ingrese cantidad de dinero a retirar: " ; 
    $cantidad = trim(fgets(STDIN)) ;
*/

/* listo 
    $retiro = new CuentaBancaria($nroCuenta, $dniCliente, $saldoActual, $interesAnual) ; 
    $verRetiro = $retiro -> retirar($cantidad) ; 
    echo "Ha retirado de su cuenta $$verRetiro ars. Saldo restante en cuenta su $saldoActual " ; 
*/ 