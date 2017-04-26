<?php
include_once'plantilla.php';
class busqueda extends plantilla
{
	function __construct()
	{
		$this->HEAD();
		$this->CUERPO1($_GET["b"]);
		$this->FOOTER();

	}//end construct

	function CUERPO1($val)
	{
		$CON = new conn();
  $C = $CON->getCon();

  $qry = sprintf("SELECT * FROM producto WHERE Nombre = '%s'",$val);

  
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
        
    ?>
<h3>Busqueda de productos</h3>
<table class="table table-striped table-bordered">
<tr>
  <th>Nombre</th>
  <th>Precio compra</th>
  <th>Precio venta</th>
  <th>Cantidad</th>
  <th>Descripcion</th>
  <th>Suplidor</th>

  <?php
  while ($row = $STM->fetch_assoc()) 
  {
  ?>
  <tr>
  <td><?php echo $row['Nombre'];?></td>
  <td><?php echo $row['PrecioCompra'];?></td>
  <td><?php echo $row['PrecioVenta'];?></td>
  <td><?php echo $row['Cantidad'];?></td>
  <td><?php echo $row['Descripcion'];?></td>
  <td><?php echo $row['Suplidor'];?></td>

  

    <?php
  }//end while
    echo "</table>";
    $STM->close();
  }//end if
  else
  {
    echo "<h3>No se encontro nada</h3>";
  }//end else
	

}//end CUERPO1

}//end class
new busqueda();

?>