<?php
include_once'metodos1.php';
include_once'plantilla.php';
class controlestudiantes extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de estudiantes");            
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
<div class="container well ">

<form action="controlestudiantes.php" method="post"> 
  <h3>Control de estudiantes</h3>

 <a href="controlestudiantes2.php">Consulta y edicion</a>

      <div class="well" style="background-color:#FFFFFF;">
        <h3>Registro</h3>

 <div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" name="nom" id="nom" required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" name="ape" id="ape" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="sexo">Sexo:</label>

   <label class="radio-inline">
      <input type="radio" name="sexo" value="Masculino" id="sexo" required="true">Masculino
    </label>
    <label class="radio-inline">
      <input type="radio" name="sexo" value="Femenino" id="sexo">Femenino
    </label>
     <label class="radio-inline">
      <input type="radio" name="sexo" value="Otro" id="sexo">Otro

    </label>
    </div>

 </div>

 </div>


<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Padre o tutor:</label>
      <input type="text" class="form-control" name="padre" id="padre" required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Telefono:</label>
      <input type="text" class="form-control" name="tel" id="tel" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Celular:</label>
      <input type="text" class="form-control" name="cel" id="cel" required="true">
    </div>
 </div>

 </div>

<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Direccion:</label>
      <input type="text" class="form-control" name="dir" id="dir" required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Nacionalidad:</label>
      <input type="text" class="form-control" name="nac" id="nac" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Fecha de nac.:</label>
      <input type="date" class="form-control" name="fecha" id="fecha" required="true">
    </div>
 </div>

 </div>

<div class="row"> 
 <div class="col-sm-4"> 
<label for="pwd">Curso:</label>
      <input type="text" class="form-control" name="curso" id="curso" required="true">
   
 </div>
  <div class="col-sm-4"> 
<label for="pwd">Correo:</label>
      <input type="text" class="form-control" name="correo" id="correo" required="true">
   
 </div>
 </div> 


<div class="row">
 <div class="col-sm-4"> 
<label for="pwd">Usuario:</label>
      <input type="text" class="form-control" name="usuario" id="usuario" required="true">
   
 </div>

 <div class="col-sm-4"> 
<label for="pwd">Clave:</label>
      <input type="text" class="form-control" value="123456" name="clave" id="clave" required="true">
   
 </div>
</div>
<div class="row"> 
 <div class="col-sm-4"> 
<button class="btn btn-success" id="btnguardar" onclick="check();">Guardar</button>
<button type="reset" class="btn btn-info">Limpiar</button>

 </div>
 </div>   

 </div>

</form>

<div id="resultado">

<?php
            if ($_SERVER["REQUEST_METHOD"]=="POST") 
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
            }
?>
  
</div>
    </div>


<?php

	}//end cuerpo1


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

new controlestudiantes();



















 