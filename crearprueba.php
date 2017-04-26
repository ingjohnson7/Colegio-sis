<?php
include_once'plantilla.php';
class crearprueba extends plantilla
{
	function __construct()
	{
		if (isset($_GET["claseid"])) 
		{
			$_SESSION["claseid"]=$_GET["claseid"];
		}
		$this->HEAD();
		$this->CUERPO1();
		$this->FOOTER();

	}//end __construct

	private function CUERPO1()
	{
		if ($_SERVER["REQUEST_METHOD"]=="POST") 
		{
			$c=0;
			foreach ($_POST as $key => $value) 
			{
			     if ($value=="") 
			     {
			     	$c++;			     	
			     }//end if

			}//end foreach
			if ($c>0) 
			{
				echo "<center><h2 class='btn-danger'>Todos los campos son obligatorios</h2></center>";
			}
			else
			{
				$this->saveprueba($_POST);
				$c=0;
			}//end else

		}//end if
	?>
	<div class="container well" style="width:60%;">
		<div class="row">
			<div class="col-sm-12">
			<form action="crearprueba.php" method="post">
				Titulo de la prueba<br>
				<input type="text" name="titulo" class="form-control" style="width:80%;">
			</div>
		</div>

		<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 1</b><br>
				<input type="text" name="p1" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r1">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r1">Falso
    </label>
			</div>
		</div>

			<div class="row" style="background-color:#AAFEFF;">
			<div class="col-sm-12">
				<b>Pregunta 2</b><br>
				<input type="text" name="p2" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r2">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r2">Falso
    </label>
			</div>
		</div>


			<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 3</b><br>
				<input type="text" name="p3" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r3">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r3">Falso
    </label>
			</div>
		</div>


			<div class="row" style="background-color:#AAFEFF;">
			<div class="col-sm-12">
				<b>Pregunta 4</b><br>
				<input type="text" name="p4" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r4">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r4">Falso
    </label>
			</div>
		</div>


		<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 5</b><br>
				<input type="text" name="p5" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r5">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r5">Falso
    </label>
			</div>
		</div>


		<div class="row" style="background-color:#AAFEFF;">
			<div class="col-sm-12">
				<b>Pregunta 6</b><br>
				<input type="text" name="p6" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r6">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r6">Falso
    </label>
			</div>
		</div>


		<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 7</b><br>
				<input type="text" name="p7" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r7">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r7">Falso
    </label>
			</div>
		</div>


	<div class="row" style="background-color:#AAFEFF;">
			<div class="col-sm-12">
				<b>Pregunta 8</b><br>
				<input type="text" name="p8" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r8">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r8">Falso
    </label>
			</div>
		</div>


		<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 9</b><br>
				<input type="text" name="p9" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r9">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r9">Falso
    </label>
			</div>
		</div>



	<div class="row" style="background-color:#AAFEFF;">
			<div class="col-sm-12">
				<b>Pregunta 10</b><br>
				<input type="text" name="p10" class="form-control" style="width:80%;"><br>
	<b>Respuesta  </b><br><label class="radio-inline">
      <input type="radio" value="Verdadero" name="r10">Verdadero
    </label>
    <label class="radio-inline">
      <input type="radio" value="Falso" name="r10">Falso
    </label>
			</div>
		</div>

<button class="btn btn-success">Guardar</button>
</form>
	</div>
	<?php	
	}//end cuerpo1

function saveprueba($DATA)
{
	$id_prueba = 0;
	$id_clase = $_SESSION["claseid"];
	$C = $this->getCon();
	$ST = $C->prepare(
		"INSERT INTO prueba VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$ST->bind_param("iisssssssssssssssssssss",
		$id_prueba,
		$id_clase,
		$DATA["titulo"],
		$DATA["p1"],
		$DATA["r1"],
		$DATA["p2"],
		$DATA["r2"],
		$DATA["p3"],
		$DATA["r3"],
		$DATA["p4"],
		$DATA["r4"],
		$DATA["p5"],
		$DATA["r5"],
		$DATA["p6"],
		$DATA["r6"],
		$DATA["p7"],
		$DATA["r7"],
		$DATA["p8"],
		$DATA["r8"],
		$DATA["p9"],
		$DATA["r9"],
		$DATA["p10"],
		$DATA["r10"]);
	$ST->execute();
	if ($ST->affected_rows > 0) 
	{
		unset($_SESSION["claseid"]);
		header("Location: menumaestro.php");

	}//end if
	else
	{
		echo "Error al guardar";
	}//end else

	$ST->close();
	$C->close();

}//end saveprueba	

}//end class

new crearprueba();
?>