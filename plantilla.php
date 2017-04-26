<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
     
  .modal-header, h4, .close {
      background-color: #0d0d0d;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .w3-lobster {
  font-family: "Lobster", serif;
}
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}


#bandejae
{
  font-weight: bold;
  border-radius: 5px;
}

.input1{
    width: 130px;
    padding: 5px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100px;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 25%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
body,td,th {
	color: #000;
}


#name
{
  font-size: 20px;
  color:#FFFFFF;
  border: solid 2px #FFFFFF;
  margin-left: 50px;
  margin-top: 5px;
  padding:3px;
  border-radius: 5px;
}

.badge2
{
  font-size: 20px;
  border-radius: 10px;
  background-color: #555555; 
  padding:5px;color: #FFFFFF;
}
</style>
<script>


function pro(event)
{
   if (event.which==13)
    {

    if ($("#inputsm").val() != "") 
    {
      var e = document.getElementById("inputsm").value;
      var ur = "busqueda.php?b="+e;
      //alert(e);
      window.location = ur;
    }
    else
    {
      alert("Escribe algo para buscar");
    }//end else  

    }//end if

}//end buscar
    
</script>

<?php
include_once'conn.php';
class plantilla extends conn
{


  function HEAD($title="Sistema de colegio")
  {
    echo "<title>$title</title></head><body>";
    
    if (!isset($_SESSION['USUARIO']))
    {
      
    ?>

<div class="container-fluid" style="margin-top:5px;">
<div class="row">
    <div class="col-sm-10" style="">
<img src="IMAGENES/escolar.jpg" style="width: 100%; height:20%;">
 

    </div>




    <div class="col-sm-2" style="margin-left:0px;">
      <center>
        <div class="well well-sm">
 

<form action="log.php" method="post">
  <span class="badge" style="font-size: 17px;">Inicia session</span>
    <input type="text" class="input1" placeholder="Tu usuario" name="uname" style="width:90%;height:35px;" required>
<br>
    <input type="password" class="input1" placeholder="Tu clave" name="psw" style="width:90%;height:35px;" required>
 <br>
 Tipo de usuario
 <select name="tipous" class="form-control">
  <option>Estudiante</option>
  <option>Maestro</option>
  <option>Web master</option>
 </select>       
    <button type="submit" class="btn btn-success">Login</button><br>
    
 

</form>

 </div>
    </div>  
  
  </div>

  </center>
</div>
    
<?php
}
?>

<nav class="navbar navbar-inverse" style="margin-top:0px;">
  <div class="container-fluid">
 
    <ul class="nav navbar-nav">
       <?php
        if (isset($_SESSION['USUARIO'])) 
        {
          
          if($_SESSION['TIPO_USUARIO']=="Web master")
          {
               echo "<li><a href=\"controlpanel.php\">
                    <span class='glyphicon glyphicon-home'></span></a></li>";
          }//end if
          else if($_SESSION['TIPO_USUARIO']=="Estudiante")
          {
            echo "<li><a href=\"menuestudiante.php\">
                    <span class='glyphicon glyphicon-home'></span></a></li>
                      <li><a href=\"buzon_est.php\" class=\"btn btn-default\"><b>Bandeja de entrada</b>
                      </a></li>";
          }//end else if
          else if($_SESSION['TIPO_USUARIO']=="Maestro")
          {
            echo "<li><a href=\"menumaestro.php\">
                    <span class='glyphicon glyphicon-home'></span></a></li>
                      <li>
                      <a href=\"buzon_maestro.php\" class=\"btn btn-default\"><b>Bandeja de entrada</b>
                      </a></li>";
          }//end else if
          ?>
      
      
          <?php  
            echo "<li><a href=\"logout.php\">
                    <b>Salir</b></a></li>";
            echo "<li id='name'><b>".$this->getNAME()."</b></li>";        
        }//end if
        else
        {?>
          
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="maestros.php">Maestros</a></li>
       <li><a href="estudiantes.php">Estudiantes</a></li>
        <li><a href="materias.php">Materias</a></li>
       
        <?php 
        }//end else

        ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">

    <input class="form-control" style="margin-top:7px;" onkeypress="pro(event)" 
    name="b" id="inputsm" type="text" placeholder="Enter para buscar">

      </li>
    </ul>
  </div>
</nav>



<?php

  }//end HEAD

  function FOOTER()
  {
?>

<br>

  <footer class="navbar navbar-inverse" style="margin-bottom:0px;">
      <div class="container" align="right">
        <p class="text-muted"><i>Creado por</i> 
        <b><a href="https:www.codeameblog.wordpress.com">QiloBit</a></b> 
        para ... </p>
      </div>
    </footer>

</body>
</html>


<?php
  }//end footer

  function CUERPO()
  {
?>

<div class="container"> 

<!--QUITAR DESDE AQUI -->


<div class="container-fluid">
 <div class="row">
    <div class="col-sm-3 well"><a href="estudiantes.php">Estudiantes</a><br>
<img src="IMAGENES/estudiantes.jpg" class="img-thumbnail " alt="Ver estudiantes" width="200" height="200">
    </div>
    <div class="col-sm-3 well"><a href="maestros.php">Maestros</a><br>
    <img src="IMAGENES/maestro.jpeg" class="img-thumbnail " alt="Ver maestros" width="200" height="200">
 </div>
    <div class="col-sm-3 well"><a href="Materias.php">Materias</a><br>
    <img src="IMAGENES/materias.jpg" class="img-thumbnail " alt="Ver materias" width="200" height="200">
</div>
 <div class="col-sm-3 well"><a href="suplidores.php">suplidores</a><br>
<img src="IMAGENES/suplidores.jpg" class="img-thumbnail " alt="Ver suplidores" width="200" height="200">
 
 </div>
  </div>

  <div class="row">
    <div class="col-sm-3 well"><a href="Cursos.php">Cursos</a><br>
    <img src="IMAGENES/cursos.jpg" class="img-thumbnail " alt="Ver cursos" width="200" height="200">
 </div>
    <div class="col-sm-3 well"><a href="precios.php">Precios</a><br>
    <img src="IMAGENES/precios.jpg" class="img-thumbnail " alt="Ver precios" width="200" height="200">
 </div>
    <div class="col-sm-3 well"><a href="personal.php">Personal</a><br>
    <img src="IMAGENES/personal.jpg" class="img-thumbnail " alt="Ver personal" width="200" height="200">
 
 </div>
 <div class="col-sm-3 well"><a href="becas.php">becas</a><br>
<img src="IMAGENES/becas.jpg" class="img-thumbnail " alt="Ver becas" width="200" height="200">
 
 </div>
  </div>
<div class="row">
    <div class="col-sm-3 well"><a href="actividades.php">actividades</a><br>
    <img src="IMAGENES/actividades.jpg" class="img-thumbnail " alt="Ver cursos" width="200" height="200">
 </div>
    <div class="col-sm-3 well"><a href="nivel_academico.php">nivel academico</a><br>
    <img src="IMAGENES/nivel academico.jpg" class="img-thumbnail " alt="Ver precios" width="200" height="200">
 </div>
    <div class="col-sm-3 well"><a href="personal.php">Personal</a><br>
    <img src="IMAGENES/personal.jpg" class="img-thumbnail " alt="Ver personal" width="200" height="200">

</div>
    <div class="col-sm-3 well"><a href="precios.php">Precios</a><br>
    <img src="IMAGENES/precios.jpg" class="img-thumbnail " alt="Ver precios" width="200" height="200">


 </div>
  </div>

</div>





<!-----HASTA AQUI-->




</div>


<?php
  }//end cuerpo


function getNAME()
{
  $C = $this->getCon();
  $qry = "";
  if ($_SESSION["TIPO_USUARIO"] == "Estudiante") 
  {
      $qry = sprintf(
        "SELECT concat(Nombre,' ',Apellido,' - ',Curso) AS Name FROM estudiante WHERE ID = %d"
        ,$_SESSION["ID_USUARIO"]);
  }
  else if($_SESSION["TIPO_USUARIO"] == "Maestro")
  {
      $qry = sprintf(
        "SELECT concat(Nombre,' ',Apellido) AS Name FROM maestro WHERE ID = %d"
        ,$_SESSION["ID_USUARIO"]);
  }
  else if($_SESSION["TIPO_USUARIO"] == "Web master")
  {
     $qry = sprintf(
        "SELECT Codigo AS Name FROM webmaster WHERE ID = %d"
        ,$_SESSION["ID_USUARIO"]);
  }//end else if
  
  $STM = $C->query($qry);
  $row = $STM->fetch_assoc();
  $C->close();
  $STM->close();
  return $row["Name"];

}//

}//end class
?>


