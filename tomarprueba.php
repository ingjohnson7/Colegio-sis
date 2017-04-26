<?php
include_once'plantilla.php';
class crearprueba extends plantilla
{
	function __construct()
	{
		if (isset($_GET["claseid"])) 
		{
			$_SESSION["claseid"]=$_GET["claseid"];
			$_SESSION["datos_prueba"] = $this->setVals();
		}

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
    

	}//end __construct

function setVals()
{
	$id = $_GET["claseid"];
	$C = $this->getCon();
	$ST = $C->query(
		sprintf("SELECT * FROM prueba WHERE ID_clase = %d",$id));
	if ($ST->num_rows > 0) 
	{
			$row = $ST->fetch_assoc();
	        return $row;
	}else{echo "Error";}

}


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
				$RESULTS = array(
					'R1' => 0, 
					'R2' => 0, 
					'R3' => 0, 
					'R4' => 0, 
					'R5' => 0, 
					'R6' => 0, 
					'R7' => 0, 
					'R8' => 0, 
					'R9' => 0, 
					'R10' => 0,
					'Nota' => 0);
				if ($_POST["r1"]==$_SESSION["datos_prueba"]["R1"]) 
				{
					$RESULTS["R1"]=10;
				}
				if ($_POST["r2"]==$_SESSION["datos_prueba"]["R2"]) 
				{
					$RESULTS["R2"]=10;
				}
				if ($_POST["r3"]==$_SESSION["datos_prueba"]["R3"]) 
				{
					$RESULTS["R3"]=10;
				}
				if ($_POST["r4"]==$_SESSION["datos_prueba"]["R4"]) 
				{
					$RESULTS["R4"]=10;
				}
				if ($_POST["r5"]==$_SESSION["datos_prueba"]["R5"]) 
				{
					$RESULTS["R5"]=10;
				}
				if ($_POST["r6"]==$_SESSION["datos_prueba"]["R6"]) 
				{
					$RESULTS["R6"]=10;
				}
				if ($_POST["r7"]==$_SESSION["datos_prueba"]["R7"]) 
				{
					$RESULTS["R7"]=10;
				}
				if ($_POST["r8"]==$_SESSION["datos_prueba"]["R8"]) 
				{
					$RESULTS["R8"]=10;
				}
				if ($_POST["r9"]==$_SESSION["datos_prueba"]["R9"]) 
				{
					$RESULTS["R9"]=10;
				}
				if ($_POST["r10"]==$_SESSION["datos_prueba"]["R10"]) 
				{
					$RESULTS["R10"]=10;
				}
				$RESULTS["Nota"] = array_sum($RESULTS);
				$this->saveprueba($RESULTS);
				$c=0;
			}//end else

		}//end if
	?>
	<div class="container well" style="width:60%;">
		<div class="row">
			<div class="col-sm-12">
			<form action="tomarprueba.php" method="post">
				<h3><?php echo $_SESSION["datos_prueba"]["Titulo"];?></h3>
			</div>
		</div>

		<div class="row" style="background-color:#FFFEAA;">
			<div class="col-sm-12">
				<b>Pregunta 1</b><br>
				<input type="text" name="p1" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P1'];?>">
				<br>
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
				<input type="text" name="p2" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P2'];?>"><br>
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
				<input type="text" name="p3" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P3'];?>"><br>
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
				<input type="text" name="p4" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P4'];?>"><br>
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
				<input type="text" name="p5" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P5'];?>"><br>
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
				<input type="text" name="p6" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P6'];?>"><br>
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
				<input type="text" name="p7" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P7'];?>"><br>
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
				<input type="text" name="p8" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P8'];?>"><br>
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
				<input type="text" name="p9" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P9'];?>"><br>
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
				<input type="text" name="p10" readonly class="form-control" style="width:80%;" value="
				<?php echo $_SESSION['datos_prueba']['P10'];?>"><br>
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
	
	$id_prueba = $_SESSION["datos_prueba"]["ID_prueba"];
	$id_estudiante = $_SESSION["ID_USUARIO"];
	$C = $this->getCon();
	$ST = $C->prepare(
		"INSERT INTO resultados_prueba VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$ST->bind_param("iiiiiiiiiiiii",
		$id_prueba,
		$id_estudiante,
		$DATA["R1"],
		$DATA["R2"],
		$DATA["R3"],
		$DATA["R4"],
		$DATA["R5"],
		$DATA["R6"],
		$DATA["R7"],
		$DATA["R8"],
		$DATA["R9"],
		$DATA["R10"],
		$DATA["Nota"]);
	$ST->execute();
	if ($ST->affected_rows > 0) 
	{
		$this->ponernota($DATA["Nota"]);
		unset($_SESSION["claseid"]);
		header("Location: menuestudiante.php");
		

	}//end if
	else
	{
		echo "Error al guardar";
		foreach ($DATA as $key => $value) {
			echo $value." ";
		}
	}//end else

	$ST->close();
	//$C->close();

}//end saveprueba	


function ponernota($nota)
{
	$C = $this->getCon();
	$ST = $C->prepare("UPDATE calificacion SET Nota1 = ? WHERE IdEstudiante = ? AND IdClase = ?;");
	$ST->bind_param("iii",
		$nota,
		$_SESSION["ID_USUARIO"],
		$_SESSION["claseid"]);
	$ST->execute();
	$ST->close();
}//end ponernota

}//end class

new crearprueba();
?>