<script>

function pro(event)
{
   if (event.which==13)
      {
        alert("Enter has been pressed");
      }
}
</script>
<?php
include_once'plantilla.php';
class pruebas 
{
function __construct()
{
?>

TEXTO
<input type="text" id="a" class="form-control" onkeypress="pro(event)"><br>



<?php
}//end cons

}//end class
new pruebas();
?>

