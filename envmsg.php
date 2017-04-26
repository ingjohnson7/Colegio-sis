<?php
include_once'plantilla.php';
class envmsg extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Maestro")
      {
            $this->HEAD("Menu de maestro - Enviar mensaje a clase");
            $this->CUERPO1();
            $this->FOOTER();
      }
     else
      {
           echo "<h2>Acceso denegado</h2>";
           echo "<a href='index.php'>Ir al inicio</a>";
      }
    

	}//end construct

	function CUERPO1()
	{
?>
<script type="text/javascript">

    function setAsunto()
    {
      var temp = document.getElementById('asuntospre').value;
      var msg = {
      "Entrega de practica" : "Buenas, por este medio te recuerdo que la practica es para la proxima clase.",
      "Acerca del examen" : "Buenas, el examen sera la próxima clase.",
      "No habra clases" : "Hola, la proxima clase no tendremos docencia."
      };

      if (temp!="-Asuntos predeterminados-") 
      {
        document.getElementById('asunto').value=temp;
        document.getElementById('msg').value=msg[temp];         
      }//fin if
    }//fin setAsunto

</script>
<div class="container" >
      
      <div class="row">
      <div class="col-sm-1"></div>

      <div class="col-sm-10  well" style="border:solid 1px; background-color: #CFFFFC;">
      <h3>Menu de maestro - Enviar mensaje a clase
      <span class="badge2"><b>
      <?php echo $this->getNomClase($_SESSION['ID_USUARIO'])?>
      </b></span></h3>



<div class="row">
<div class="col-sm-8">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<label>Asunto</label> 
  <input type="text" class="form-control" name="asunto" id="asunto" required="true">
<label>Mensaje</label>
<textarea class="form-control" required="true" minlength="20" rows="8" name="msg" id="msg"></textarea>
  <br>
<div class="row">
  <div class="col-sm-3">
<input type="submit"  class="btn btn-success" value="Enviar" style="width: 100%;">
</div>
<div class="col-sm-3">
<input type="reset"  class="btn btn-default" value="Limpiar" style="width: 100%;">
    
  </div>
  <div class="col-sm-6">
<select id="asuntospre" class="form-control" onchange="setAsunto()">
  <option selected>-Mensajes predeterminados-</option>
  <option>Entrega de practica</option>
  <option>Acerca del examen</option>
  <option>No habra clases</option>
</select>
    
  </div>
</div>




</form>
</div>
<center>
<span class=" badge" style="font-size:20px;">Numero de estudiantes</span>
<div class="col-sm-4 well" style="padding-left:20px; padding-right:20px;" textwrap>


</div>

</center>

</div>




      </div>

      <div class="col-sm-1"></div>
  
      </div>
</div>
 
<?php

  if ($_SERVER["REQUEST_METHOD"]=="PHP") 
  {
    $this->sendMsgToAll();
  }//end if

}//end cuerpo1


function getNomClase($ide)
{
  $C = $this->getCon();
  $qry = sprintf("
    SELECT 
    clase.ID,
    clase.Materia 
    FROM 
    clase 
    WHERE 
    Maestro 
    IN 
    (SELECT 
    concat(Nombre,' ',Apellido) 
    FROM 
    maestro 
    WHERE 
    ID = %d)",$ide);

  $STM = $C->query($qry);
  $row = $STM->fetch_assoc();
  return $row["ID"]." - ".$row["Materia"];  
}//end getNomClase


private function sendMsgToAll()
{
    $qry = "INSERT INTO buzon_est VALUES ();";

}//end updateNotasAll

}//end class
new envmsg();

?>