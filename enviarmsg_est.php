<?php
include_once'plantilla.php';
class enviarmsg_est extends plantilla
{
	
function __construct()
{
	if (isset($_POST)) 
	{
		$this->sendMsg();
	}//end if

}//end construct

private function sendMsg()
{
  $IdMensaje = 0;
  $IdEstudiante = $_SESSION["ID_USUARIO"];
  $IdClase = $_POST["idclase"];
  $asunto = strtoupper($_POST["asunto"]);
  $msg = $_POST["msg"];
  $fecha = date("Y-m-d");
  $visto = 0;

  $C = $this->getCon();
  $STM = $C->prepare("INSERT INTO buzon_maestro VALUES (?,?,?,?,?,?,?)");
  $STM->bind_param("isssssi",
    $IdMensaje,
    $IdEstudiante,
    $IdClase,
    $asunto,
    $msg,
    $fecha,
    $visto);
  $STM->execute();

  if ($STM->affected_rows > 0) 
  {
    echo "
<div class=\"alert alert-success\">
 <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Se envio el msg</strong> 
</div>
    ";

  }//end if
  else
  {
    echo "

<div class=\"alert alert-danger\">
 <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Error!</strong> while sending..
</div>

    ";
  }//end else

   $STM->close();
   $C->close();
 

}//end sendMsg

}//end class

?>