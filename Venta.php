<?php

class Venta{
    //!ATRIBUTOS

    private $numero;
    private $fecha; 
    private $objCliente; //Referencia al cliente
    private $col_motos;
    private $precioFinal;

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($numero, $fecha, $objCliente, $col_motos ,$precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->col_motos = $col_motos;
        $this->precioFinal = $precioFinal;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getNumero(){
        return $this->numero;
     }

     public function getFecha(){
        return $this->fecha;
     }

     public function getObjCliente(){
        return $this->objCliente;
     }

     public function getCol_motos(){
        return $this->col_motos;
     }

     public function getPrecioFinal(){
        return $this->precioFinal;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewNumero($nuevoNumero){
        $this->numero = $nuevoNumero;
     }

     public function setNewFecha($nuevaFecha){
        $this->fecha = $nuevaFecha;
     }

     public function setNewObjCliente($nuevoObjCliente){
        $this->objCliente = $nuevoObjCliente;
     }

     public function setNewCol_motos($nuevaColMotos){
        $this->col_motos = $nuevaColMotos;
     }

     public function setNewPrecioFinal($nuevoPrecioFinal){
        $this->precioFinal = $nuevoPrecioFinal;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return "------------VENTA--------------\n". 
                "Numero: " . $this->getNumero() . "\n". 
                "Fecha: " . $this->getFecha() . "\n". 
                "Cliente: \n" . $this->getObjCliente() . "\n". 
                "Motos: \n" . $this->convertirAString($this->getCol_motos()) . "\n". //PASAR A STRING
                "Precio Final: $" .$this->getPrecioFinal() . "\n" . 
                "-------------------------------\n";
     }
     

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function convertirAString($col){
        $cadena = "";
        foreach ($col as $elemento) {
            $cadena .= $elemento;
  
        }
        return $cadena;
     }

     /**
      * Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de
      * cada una de las motos Nacionales vinculadas a la venta.
      */

      public function retornarTotalVentaNacional(){

        $duplMotos = $this->getCol_motos();
        $total = 0;

            foreach ($duplMotos as $moto) {
                if ($moto instanceof MotoNacional && $moto->getActiva() == true) {
                    
                    $total += $moto->getCosto();

                }
            }

        return $total;
      }

      /**
       * Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas
       * vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe
       * ser vacía.
       */

       public function retornarMotosImportadas(){

        $duplMotos = $this->getCol_motos();
        $motosImportadas = [];

            foreach ($duplMotos as $moto) {
                if ($moto instanceof MotoImportada && $moto->getActiva() == true) {
                    
                    $motosImportadas[] = $moto;
                }
            }

        return $this->convertirAString($motosImportadas);
       }

       public function incorporarMoto($objMoto){
        if ($objMoto->getActiva() == true) {
           $col_motos = $this->getCol_motos();
           array_push($col_motos, $objMoto);
           $this->setNewCol_motos($col_motos);
           $this->setNewPrecioFinal($this->getPrecioFinal() + $objMoto->darPrecioVenta());
        }
        
    }






}