<?php
class View{
	public function render($page){
		include "./src/front/html/$page.html";
	}
}