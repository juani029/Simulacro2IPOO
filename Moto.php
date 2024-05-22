<?php 

class Moto{
    //! ATRIBUTOS 
    
    private $codigo;
    private $costo;
    private $anioFabri;
    private $descrip;
    private $porcIncAnual; //Porcentaje de incremento anual.
    private $activa; //Atributo que da true o false para saber si la moto se encuentra en venta.

    /** 
     * ! **********************************************************************
     * ! *************************** CONSTRUCTOR ******************************
     * ! **********************************************************************
     */

     public function __construct($codigo, $costo, $anioFabri, $descrip, $porcIncAnual, $activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabri = $anioFabri; 
        $this->descrip = $descrip;
        $this->porcIncAnual = $porcIncAnual;
        $this->activa = $activa;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO GETTER ****************************
     * ! **********************************************************************
     */

     public function getCodigoM(){
        return $this->codigo;
     }

     public function getCosto(){
        return $this->costo;
     }

     public function getAnioFabri(){
        return $this->anioFabri;
     }

     public function getDescrip(){
        return $this->descrip;
     }

     public function getPorcIncAnual(){
        return $this->porcIncAnual;
     }

     public function getActiva(){
        return $this->activa;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO SETTER ****************************
     * ! **********************************************************************
     */

     public function setNewCodigo($nuevoCodigo){
        $this->codigo = $nuevoCodigo;
     }

     public function setNewCosto($nuevoCosto){
        $this->costo = $nuevoCosto;
     }

     public function setNewAnioFabri($nuevoAnioFabri){
        $this->anioFabri = $nuevoAnioFabri;
     }

     public function setNewDescrip($nuevaDescrip){
        $this->descrip = $nuevaDescrip;
     }

     public function setNewPorcIncAnual($nuevoIncAnual){
        $this->porcIncAnual = $nuevoIncAnual;
     }

     public function setNewActiva($nuevaActiva){
        $this->activa = $nuevaActiva;
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODO __toString ************************
     * ! **********************************************************************
     */

     public function __toString(){
        return "-------------MOTO--------------\n" . 
                "Código: " .$this->getCodigoM() ."\n". 
                "Costo: $" .$this->getCosto() ."\n". 
                "Año de Fabricación: " .$this->getAnioFabri() ."\n". 
                "Descripción: " . $this->getDescrip() ."\n". 
                "Incremento anual: " . $this->getPorcIncAnual() ."%\n". 
                "Se vende: " . $this->getActiva() ."\n";
     }

     /** 
     * ! **********************************************************************
     * ! *************************** METODOS **********************************
     * ! **********************************************************************
     */

     public function darPrecioVenta(){
        
        $venta = -1; 
        if ($this->getActiva()) {
           $compra = $this->getCosto();
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