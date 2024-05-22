<?php 

class MotoNacional extends Moto{

    //!ATRIBUTOS
    private $porcDescuento;

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($codigo, $costo, $anioFabri, $descrip, $porcIncAnual, $activa, $porcDescuento){
        parent:: __construct($codigo, $costo, $anioFabri, $descrip, $porcIncAnual, $activa);
            $this->porcDescuento = $porcDescuento;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getPorcDescuento(){
        return $this->porcDescuento;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setPorcDescuento($porcDescuento){
        $this->porcDescuento = $porcDescuento;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        
        return parent::__toString(). 
        "Porcentaje de descuento: ".$this->getPorcDescuento() . "%\n";
     }


     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function darPrecioVenta(){
        
      $venta = -1; 
      if ($this->getActiva()) {
         $compra = $this->getCosto() - $this->getCosto() * ($this->getPorcDescuento() / 100); //* ACA SE LE HACE EL DESCUENTO? O AL PRECIO FINAL??
         $anio = 2024 - $this->getAnioFabri();
         $porc_inc_anual = $this->getPorcIncAnual() / 100; 
         $venta = $compra + $compra * ($anio * $porc_inc_anual);
      //    $porcTotal = $anio * $porc_inc_anual;
      //    $incTotal = $compra * $porcTotal;
      //    $venta = $compra + $incTotal;
      }
      return $venta;
  }
}

