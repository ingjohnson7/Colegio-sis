<?php
include_once'plantilla.php';
class cambiarclaveest extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Estudiante")
      {
            $this->HEAD("Menu de estudiante - Cambiar clave");
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

<div class="container">
   
 
<h3 class="w3-allerta">Cambiar clave de acceso</h3>
     
<div class="row" style="padding:40px 50px;">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<div class="col-sm-5">
Clave antigua:
<input type="password" class="form-control" name="clave1" required="true">

Clave nueva:
<input type="password" class="form-control" name="clave2" required="true">
Repetir clave nueva:
<input type="password" class="form-control" name="clave3" required="true">
<br>
<input type="submit" name="Enviar" class="btn btn-success">
</div>
</form>
</div>
     

</div>

<center>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
  if ($this->pass($_POST["clave1"])) 
  {
    
    if ($_POST["clave2"]===$_POST["clave3"]) 
    {
      echo "Exito";
    
    }//end if
    else
    {
      echo "<h4>Las claves no coinciden</h4>";
    }//end else

  }//end if pass
  else
  {
    echo "<h4>La clave actual es incorrecta</h4>";
  }
  
}//end if _SERVER


}//end cuerpo1


private function pass($clave)
{
  $d = true;

  return $d;
}//end pass

}//end class
new cambiarclaveest();

?>