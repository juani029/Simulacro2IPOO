<?php 

class MotoImportada extends Moto{

    //!ATRIBUTOS
    private $paisImp; //*PAIS DEL IMPUESTO.
    private $impPais;

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($codigo, $costo, $anioFabri, $descrip, $porcIncAnual, $activa, $paisImp, $impPais){
        parent:: __construct($codigo, $costo, $anioFabri, $descrip, $porcIncAnual, $activa);
            $this->paisImp = $paisImp;
            $this->impPais = $impPais;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getPaisImp(){
        return $this->paisImp;
    }

    public function getImpPais(){
        return $this->impPais;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setPaisImp($paisImp){
        $this->paisImp = $paisImp;
    }

    public function setImpPais($impPais){
        $this->impPais = $impPais;
    }

    /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        
        return parent::__toString(). 
        "PAIS DEL IMPUESTO: ".$this->getPaisImp() . "\n". 
        "IMPUESTO POR EL PAIS: ".$this->getImpPais() . "\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function darPrecioVenta(){
        
        $venta = -1; 
        if ($this->getActiva()) {
           $compra = $this->getCosto() + $this->getImpPais(); //* ACA SE LE AGREGA EL IMPUESTO PAIS O AL PRECIO FINAL?
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