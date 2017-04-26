<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
  <link rel="stylesheet" type="text/css" href="BANNER/engine1/style.css" />
  <!-- End WOWSlider.com HEAD section -->


  <link href="CSS/bootstrap.css" rel="stylesheet" type="text/css" >  
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/jquery-3.1.1.min.js"></script>


<style>


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

#colhead
{

  background-repeat: no-repeat;
}
</style>


<div class="container-fluid" style="margin-top:5px;">

<div class="row">
    <div class="col-sm-10" id="colhead">
 <img src="IMAGENES/escolar.jpg" style="width: 100%; height:35%;">
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

 
</div>
    


<nav class="navbar navbar-inverse" style="margin-top:0px;">
  <div class="container-fluid">
 
    <ul class="nav navbar-nav">
      
        <li><a href="maestros.php">Maestros</a></li>
       <li><a href="estudiantes.php">Estudiantes</a></li>
        <li><a href="materias.php">Materias</a></li>
       
      
             
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="maestros.php">Maestros</a></li>
       <li><a href="estudiantes.php">Estudiantes</a></li>
        <li><a href="materias.php">Materias</a></li>
       

    </ul>
    <ul class="nav navbar-nav navbar-right">

    <input class="form-control" style="margin-top:7px;" onkeypress="pro(event)" 
    name="b" id="inputsm" type="text" placeholder="Enter para buscar">

      </li>
    </ul>
  </div>
</nav>


