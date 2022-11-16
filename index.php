<?php
include './src/php/autoload.php';
use \Router as Router;
use \View as View;
use \Database as Database;
use \Controller as Controller;
use \Config as Config;
$Router = new Router;
$View = new View;
$Config = new Config;
$Controller = new Controller;
$DB = new Database($Config->data()["host"],$Config->data()["user"],$Config->data()["pass"],$Config->data()["name"]);
$Router->add("/","View::render", "index");
$Router->add("/addproduct", "View::render", "addproduct");
$Router->add("/product/get", "Controller::get");
$Router->add("/product/add", "Controller::add");
$Router->add("/product/delete", "Controller::delete");
$Router->run();