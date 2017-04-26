<?php

include_once'conn.php';
include_once'plantilla.php';
class log extends conn
{
	function __construct()
	{
		$this->CUERPO();
	}//end construct

    
    function CUERPO()
    {
    	if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$USUARIO = $_POST['uname'];
			$CLAVE = $_POST['psw'];
			$TIPO_USUARIO = $_POST['tipous'];

			if($this->ver($USUARIO, $CLAVE, $TIPO_USUARIO))
			{
				$_SESSION['TIPO_USUARIO'] = $TIPO_USUARIO;		    			    
			    $_SESSION['USUARIO'] = $USUARIO;

			    if($TIPO_USUARIO == "Estudiante")
			    {
			    	?><script>window.location="menuestudiante.php";</script><?php
			    }//end if
			    else if($TIPO_USUARIO == "Maestro")
			    {
			    	?><script>window.location="menumaestro.php";</script><?php
			    }//end else if
			    else if($TIPO_USUARIO == "Web master")
			    {
			    	?><script>window.location="controlpanel.php";</script><?php
			    }//end else if 2

			}//end if ver
			else
			{
				echo "<div class='well'><h3>Usuario o calve incorrectos</h3></div>";
			}//end else ver

		}//end if server

    }//end cuerpo


	function ver($us,$cl,$tu)
	{
		$state = false;
		$qry ="";
		if($tu == "Estudiante")
		{
			$qry = sprintf(
			"SELECT * FROM estudiante WHERE Codigo = '%s'",$us);
		}//end if
		else if($tu == "Maestro")
		{
			$qry = sprintf("SELECT * FROM maestro WHERE Codigo = '%s'",$us);
		}//end else
		else if($tu == "Web master")
		{
			$qry = sprintf(
			"SELECT * FROM webmaster WHERE Codigo = '%s'",$us);
		}//end else

		$C = $this->getCon();
		$STM = $C->query($qry);
		//$STM->bind_param("ss", $us, $cl);
		//$STM->execute();

		if($STM->num_rows > 0)
		{
			$row=$STM->fetch_assoc();
			if ($row['Clave']==md5($cl))
			{
				$state = true;
				$_SESSION['ID_USUARIO']=$row['ID'];
			}//end if
			
		}//end if
		return $state;

	}//end ver

}//end class
new log();

?>