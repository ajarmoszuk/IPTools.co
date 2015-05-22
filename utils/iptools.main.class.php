<?php
namespace IPTools;

class Main {
	public function getTemplate($fileName) {
		echo file_get_contents("templates/".$fileName.".tpl");
	}

	public function sanitize($input) {
		if(preg_match("/([%\#\;'<>*]+)/", $input))
		{
   			return false;
		}
		else {
   			return addslashes($input);
		}
	}
}
?>