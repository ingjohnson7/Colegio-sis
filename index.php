
<?php
include_once'plantilla.php';
class index extends plantilla
{
	function __construct()
	{
		$this->HEAD();
		$this->CUERPO();
		$this->FOOTER();

	}
}
new index();

?>