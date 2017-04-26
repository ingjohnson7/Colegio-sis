<?php
//eliminar estudiante
include_once'conn.php';
class eliminarprueba extends conn
{
	function __construct()
	{
		$C = $this->getcon();
		$id = $_GET['claseid'];
		
		$STM = $C->prepare("DELETE FROM prueba WHERE ID_clase = ?");
		$STM->bind_param("i",$id);
		$STM->execute();

		if ($STM->affected_rows > 0) 
		{
			?><script>window.location = "menumaestro.php";</script><?php
		}//end if
		else
		{
			echo "Error al borrar";
		}//end else

	}//end construct


}//end class
new eliminarprueba();
?>