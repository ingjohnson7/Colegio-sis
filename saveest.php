 <script>
 function check()
 {
  var campos = "";
   if (document.getElementById('nom').value == "") 
   {
    campos +="Nombre \n";
   }
  if (document.getElementById('ape').value == "") 
   {
    campos +="Apellido \n";
   }
   if (document.getElementById('padre').value == "") 
   {
    campos +="Padre\n";
   }
   if (document.getElementById('tel').value == "") 
   {
    campos +="Telefono\n";
   }
   if (document.getElementById('dir').value == "") 
   {
    campos +="Direccion\n";
   }
    if (document.getElementById('nac').value == "") 
   {
    campos +="Nacionalidad\n";
   }
   if (document.getElementById('fecha').value == "") 
   {
    campos +="Fecha de nacimiento\n";
   }
   if (document.getElementById('curso').value == "") 
   {
    campos +="Curso\n";
   }
   if (document.getElementById('correo').value == "") 
   {
    campos +="Correo\n";
   }
   if (document.getElementById('usuario').value == "") 
   {
    campos +="Usuario";
   }
   
   if(campos!="")
   {
    alert("Los siguientes campos son obligatorios:\n"+campos);
   }
   else
   {

     var valores = {
                "nom" : $("#nom").val(),
                "ape" : $("#ape").val(),
                "sexo" : $("#sexo").val(),
                "padre" : $("#padre").val(),
                "tel" : $("#tel").val(),
                "cel" : $("#cel").val(),
                "dir" : $("#dir").val(),
                "nac" : $("#nac").val(),
                "fecha" : $("#fecha").val(),
                "curso" : $("#curso").val(),
                "correo" : $("#correo").val(),
                "usuario" : $("#usuario").val(),
                "clave" : $("#clave").val()
        };
       
        $.ajax({
                data:  valores,
                url:   'saveest.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#nom").val("");
                        $("#ape").val("");
                        $("#sexo").val("");
                        $("#padre").val("");
                        $("#tel").val("");
                        $("#cel").val("");
                        $("#dir").val("");
                        $("#nac").val("");
                        $("#fecha").val("");
                        $("#curso").val("");
                        $("#correo").val("");
                        $("#usuario").val("");
                                                
                }
        });
   }

 }//end check

</script>


<?php
include_once'conn.php';
class saveest extends conn
{
  function __construct()
  {

         $this->save($_POST['nom'],
              $_POST['ape'],
              $_POST['sexo'],
              $_POST['curso'],
              $_POST['padre'],
              $_POST['tel'],
              $_POST['cel'],
              $_POST['dir'],
              $_POST['nac'],
              $_POST['fecha'],             
              $_POST['correo'],
              $_POST['usuario'],
              $_POST['clave']);



  }//end construct



function save($n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12,$n13,$n14)
    {
      $C = $this->getCon();
      $id=0;
        $nombre = $n2;
        $apellido = $n3; 
        $sexo = $n4;
        $curso = $n5;
        $padre = $n6;
        $telefono = $n7;
        $celular = $n8;
        $direccion = $n9;
        $nac = $n10;
        $fecha = $n11;
        $correo = $n12;
        $usuario = $n13;
        $clave = md5($n14);


      $STM = $C->prepare("INSERT INTO estudiante VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $STM->bind_param("isssssssssssss",
        $id,
        $nombre,
        $apellido,
        $sexo,
        $curso,
        $padre,
        $telefono,
        $celular,
        $direccion,
        $nac,
        $fecha,
        $correo,
        $usuario,
        $clave);

      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
           echo "<div class=\"col-sm-12 alert alert-success text-center\"     style='float:left;'>
               <strong>El estudiante se registro</strong></div>";
           $STM->close();
           $C->close();
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new saveest();

?>
