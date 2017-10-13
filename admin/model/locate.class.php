<?php
/**
* 
*/
class Locate extends Connection
{
	
	public function getLocation($link){
		echo '<script type="text/javascript" language="javascript" >
		
		window.location = "'.$link.'";
		
		</script>';
	}
}
?>