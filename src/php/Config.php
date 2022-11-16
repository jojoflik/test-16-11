<?php
class Config{
	public function __construct(){
		$this->data = [
			"host" => "localhost",
			"user" => "root",
			"pass" => "",
			"name" => "test"
		];
	}
	public function data(){
		return $this->data;
	}
}