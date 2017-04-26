<?php

class conn
{
	function getCon()
	{
         $C = new mysqli("localhost","root","","colegio");
         if($C == null)
         {
         	die("Error en coneccion");
         }
         return $C;

	}
}
?>