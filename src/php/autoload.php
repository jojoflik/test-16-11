<?php
spl_autoload_register(function ($class){
	if (file_exists($class.".php")) include_once($class.".php");
	else{
		$class = str_replace("\\","/",$class);
		$path = "./src/php/$class.php";
		if (file_exists($path)){
			include_once($path);
		}else{
			die("Error loading class $path");
		}
	}
});