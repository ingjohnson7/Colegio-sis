<?php

class conn
{
	function getCon()
	{
         $C = new mysqli("sql207.eshost.com.ar","eshos_17312865","sliceoflif3","eshos_17312865_colegio");
         if($C == null)
         {
         	die("Error en coneccion");
         }
         return $C;

	}
}
?>