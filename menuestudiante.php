<?php
include_once'plantilla.php';
class menuestudiante extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Estudiante")
      {
            $this->HEAD("Menu de estudiante");
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

<script>

$('#setidclase').click(function(){
    id_clase = $('#setidclase').attr('data-idclase');
});
    
  
$(document).ready(function(){

$('#sendmsg').click(function(){
  alert(id_clase); 
  var asunto = $('#asunto').val();
  var msg = $('#msg').val();
  
  $.ajax({
              url: 'enviarmsg_est.php', // point to server-side PHP script 
              dataType: 'text',  // what to expect back from the PHP script, if anything
              data:{
                asunto : asunto,
                msg: msg,
                idclase: id_clase
              },                         
              type: 'post',
              success: function(php_script_response)
              {
                   $('#response').append(php_script_response);// display response from the PHP script
              }
         });

});



});

</script>

<div class="container">

      <div class="row">
      <div class="col-sm-4  well">
      <h3>Menu de estudiante</h3>
      <br>
	<a href="vernotas.php" class="btn btn-primary">Calificaciones</a>


  <br><br>
	<a href="cambiarclaveest.php" class="btn btn-primary">Cambiar clave</a><br><br>
	  </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-7 well" id="lateral1">
      	<h3>Horario de materias</h3>
      	<?php $this->showHorario();?>
      </div>      
      </div>

 <div id="response"></div>

<!-- Modal -->
  <div id="modalmsg" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 40px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="w3-allerta">Enviar mensaje</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">


<label>Asunto</label> 
  <input type="text" class="form-control" id="asunto">
<label>Mensaje</label>
<textarea class="form-control" minlength="20" rows="8" id="msg"></textarea>
<button class="btn btn-success" style="width: 20%" id="sendmsg" data-dismiss="modal">Enviar</button>


        </div>
     
      </div>
      
    </div>
  </div> 
</div>
 
 <!-- modal -->




</div>
 




<?php

	}//end cuerpo1

function showHorario()
{
  $id = $_SESSION['ID_USUARIO'];
  $C = $this->getCon();
  
  $qry = sprintf("
SELECT
  clase.ID,
  clase.Maestro,
  clase.Materia,
  clase.Horario
FROM
  clase
WHERE
  clase.ID 
IN 
  (SELECT horario.IdClase FROM horario WHERE horario.IdEstudiante = %d)",$id);

  $STM = $C->query($qry);
  //$STM->bind_param("i",$id);
  //$STM->execute();

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>Materia</th>
  <th>Horario</th>
  <th>Maestro</th>
  <th>Accion</th>

<?php

    while($row = $STM->fetch_assoc())
    {
    
 echo " <tr>
  <td>".$row['Materia']."</td>
  <td>".$row['Horario']."</td>
  <td>".$row['Maestro']."</td>
  <td><a href='#' data-toggle='modal' data-target='#modalmsg' id='setidclase' data-idclase='".$row['ID']."'>
  <span class='glyphicon glyphicon-inbox'></span></a>
  </td>
</th>";

    
    }//end while  
    echo "</table>";
  }//end if
  else
  {
    echo "<h3>No hay materias inscritas</h3>".$id;

  }//end else

$STM->close();
$C->close();    

}//end showHorario


}//end class
new menuestudiante();

?>