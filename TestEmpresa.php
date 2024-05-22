<?php 

include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoNacional.php';
include_once 'MotoImportada.php';
include_once 'Venta.php';
include_once 'Empresa.php';

$objMoto = new Moto("123", 1000, "2001", "Motomel", 0, true);
$objMotoNacional = new MotoNacional("456", 1000, "2002", "Mondial", 10, true, 10);
$objMotoNacional2 = new MotoNacional("478", 3000, "2005", "Zanella", 10, true, 10);
$objMotoImportada = new MotoImportada("789", 5000, "2003", "Skua", 0, true, "Chile", 500);
$objMotoImportada2 = new MotoImportada("954", 2000, "2015", "Yamaha", 0, true, "España", 1000);
$colMotos = [$objMoto, $objMotoNacional, $objMotoImportada, $objMotoNacional2, $objMotoImportada2];
$colCodigos = ["456", "789", "478", "954"];
$objCliente = new Cliente("Erick", "Gonzalez", "DNI", "43372217", "125");
$objCliente2 = new Cliente("Milagros", "Argañaraz", "DNI", "43372217", "456");
$colClientes = [$objCliente, $objCliente2];


$objVenta = new Venta("152", 2024, $objCliente, $colMotos, 0);
// echo $objVenta->retornarMotosImportadas();

$objEmpresa = new Empresa("VENTA DE MOTOS", "Lisandro de la torre 62", $colClientes, $colMotos);
$objEmpresa->registrarVenta($colCodigos, $objCliente);
echo $objEmpresa->informarVentasImportadas();