<?php
include_once'conn.php';
class editarmae extends conn
{
	function __construct()
	{
    $this->editar($_POST);
	}//end construct


function editar($data)
{
  $C = $this->getcon();
  $idest = $data['ID'];
  $q1 = "";

    foreach ($data as $key => $value)
    {
      if ($value!="")
      {
      	 if ($key=="ID") 
      	 {
      	 	continue;
      	 }

         if ($key=="Nombre") 
         {
            $q1 .= "$key = '$value'";   
         }//end if
         else
         {
            $q1 .= ",$key = '$value'"; 
         }//end else

      }//end if

    }//end foreach
   
   $qry = sprintf("UPDATE maestro SET %s WHERE ID = ?",$q1);
   
   $STM = $C->prepare($qry);
   $STM->bind_param("i",$idest);
   $STM->execute();
   
  if ($STM->affected_rows > 0) 
  {
    echo "<h3>Datos actualizados correctamente</h3>";
    $STM->close();
  }//end if
  else
  {
  	echo "<h3>Ocurrio un error al actualizar los datos.</h3>";
  }

}//end editar





}//end class

new editarmae();
?>