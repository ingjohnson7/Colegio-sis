<?php
include_once'conn.php';
class asignarclase2 extends conn
{
  function __construct()
  {
          $this->save($_POST['idclase'],
              $_POST['idestudiante']);
          
  }//end construct



function save($n2, $n3)
    {
      $C = $this->getCon();

      $idhorario = 0;
      $idclase = intval($n2);
      $idestudiante = intval($n3);

      if (!$this->updateCantEst($idclase))
      {
         echo "Ocurrio un error al sumar el estudiante";
         exit;
      }//end if
      
      $STM = $C->prepare("INSERT INTO horario VALUES (?,?,?)");
      $STM->bind_param("iii",
        $idhorario,
        $idclase,
        $idestudiante);
      $STM->execute();
      
      $qry2 = sprintf("INSERT INTO calificacion VALUES (%d,%d,0,0,0,0)",$idestudiante,$idclase);

      if ($STM->affected_rows > 0) 
      {
        echo "<div class=\"col-sm-12 alert alert-success text-center\" style='float:left;'>
               <strong>El estudiante se agrego a la clase.</strong></div>";
        $STM2=$C->query($qry2);
              
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }
      $STM->close();


 }//end save     

 function updateCantEst($idclase)
 {
   $C = $this->getCon();
   $STM = $C->prepare("UPDATE clase SET Estudiantes = (Estudiantes + 1) WHERE ID = ?");
   $STM->bind_param("i",$idclase);
   $STM->execute();
   $state = false;

   if($STM->affected_rows > 0)
    {
      $state = true;
    }//end if

    return $state;
 }//end updateCantEst

}//end class

new asignarclase2();


