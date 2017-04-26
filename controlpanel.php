<?php

include_once'plantilla.php';
class controlpanel extends plantilla
{
	function __construct()
	{
		if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Panel de control");
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
  <h2>Panel de control</h2>




	<div class="row">
		  	  <div class="col-sm-3">
  <a href="controlestudiantes.php">
  <button type="button" class="btn btn-primary">Estudiantes</button>
  </a>
  <a href="controlmaestros.php">
  <button type="button" class="btn btn-primary">Maestros</button>
  </a>
  <a href="controlmaterias.php">
  <button type="button" class="btn btn-primary">Materias</button>
  </a>
  <a href="controlclases.php">
  <button type="button" class="btn btn-primary">Clases</button>
  </a>
  <a href="controlsuplidores.php">
  <button type="button" class="btn btn-primary">Suplidores</button>
  </a>
  <a href="controlproductos.php">
  <button type="button" class="btn btn-primary">Productos</button>
  </a>  
   <a href="controlempleados.php">
  <button type="button" class="btn btn-primary">Empleados</button>
  </a> 
   <a href="controlpagos.php">
  <button type="button" class="btn btn-primary">Pagos</button>
  </a>  
  	  </div>

  	  <div class="col-sm-5">
 
  <a href="asignarclase.php">
  <button type="button" class="btn-primary">Asignar clases</button>
  </a>  
  
  	  </div>
	</div>




  </div>
 



<?php

	}//end cuerpo1


}
new controlpanel();

?>