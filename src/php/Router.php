<?php
class Router{
	public function __construct(){$this->pages = [];}
	public function add($url, $loader, $parameters = null){
		if ($parameters !== null)
			$this->pages[]="$url^$loader^$parameters";
		else
			$this->pages[]="$url^$loader";
	}
	public function run(){
		$url = $_SERVER['REQUEST_URI'];
		$found = 0;
		foreach ($this->pages as $page){
			$check = explode("^", $page);
			if ($url == $check[0]){
				if (isset($check[2]))
				{
					return call_user_func($check[1], $check[2]);
				}
				else{
					return call_user_func($check[1]);
				}
			}
		}
		if ($found == 0) return call_user_func("View::render", "404");
	}
}