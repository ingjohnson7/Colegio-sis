<?php
//eliminar estudiante
include_once'conn.php';
class delest extends conn
{
	function __construct()
	{
		$C = $this->getcon();
		$id = $_GET['id'];
		
		$STM = $C->prepare("DELETE FROM estudiante WHERE ID = ?");
		$STM->bind_param("i",$id);
		$STM->execute();

		if ($STM->affected_rows > 0) 
		{
			?><script>window.location = "controlestudiantes2.php";</script><?php
		}//end if
		else
		{
			echo "Error al borrar";
		}//end else

	}//end construct


}//end class
new delest();
?>