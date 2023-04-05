<?php 

    class CuentaBancaria {
        private $nroCuenta ; 
        private $dniCliente ; 
        private $saldoActual ; 
        private $interesAnual ; 

        public function __construct(
            $nroCuenta, 
            $dniCliente, 
            $saldoActual, 
            $interesAnual, 
        ) {
            $this -> nroCuenta = $nroCuenta ; 
            $this -> dniCliente = $dniCliente ; 
            $this -> saldoActual = $saldoActual ;
            $this -> interesAnual = $interesAnual ; 
        }

        public function getNroCuenta() {
            return $this -> nroCuenta ;
        }
        public function getDniCliente() {
            return $this -> dniCliente ; 
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
        public function setDniCliente($dniCliente) {
            $this -> dniCliente = $dniCliente ; 
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

        /*
        public function retirar($cantidad) {
            $disponible = false ; 
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
            return $disponible ; 
        }
        */

        public function retirar($cantidad) {
            $disponible = false ; 
            $saldoActual = $this -> getSaldoActual() ; 

                if($saldoActual > 0) {
                    if($saldoActual > $cantidad) {
                        $disponible = true ; 
                        $saldoActual = $saldoActual - $cantidad ; 
                        $this -> setSaldoActual($saldoActual) ; 
                    }
                }
            return $disponible ; 
        }

        public function __toString() {
            return "Numero de cuenta: " ; 
        }
    }  