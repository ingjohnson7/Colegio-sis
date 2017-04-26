<?php

include_once'plantilla.php';
class controlpagos extends plantilla
{
	function __construct()
	{
		if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de pagos");
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
  <h2>Control de pagos</h2>









  </div>
 



<?php

	}//end cuerpo1


}
new controlpagos();

?>