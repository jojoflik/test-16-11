<?php
class Controller{
	public function get(){
		$Cfg = new Config();
		$DB = new Database($Cfg->data()["host"],$Cfg->data()["user"],$Cfg->data()["pass"],$Cfg->data()["name"]);
		$result = $DB->query("SELECT * FROM `products`");
		while ($row = mysqli_fetch_assoc($result)){
			echo '<div class="card text-center" delID="'.$row["id"].'" style="width: 15rem;">
					  <input type="checkbox" class="delete-checkbox">
					  <div class="card-body">
					    <h5 class="card-title">'.$row["sku"].'</h5>
					    <span class="card-text">'.$row["name"].'</span>
					    <span class="card-text">'.$row["price"].' $</span>
					    <span class="card-text">'.$row["info"].'</span>
					  </div>
					</div>';
		}
	}
	public function add(){
		$Cfg = new Config();
		$DB = new Database($Cfg->data()["host"],$Cfg->data()["user"],$Cfg->data()["pass"],$Cfg->data()["name"]);
		$sku = $_POST["sku"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		$productType = $_POST["productType"];
		switch ($productType){
			case "dvd":
				$size = $_POST["size"];
				$info = "Size: ".$size."MB";
				break;
			case "book":
				$weight = $_POST["weight"];
				$info = "Weight: ".$weight."KG";
				break;
			case "furniture":
				$height = $_POST["height"];
				$width = $_POST["width"];
				$length = $_POST["length"];
				$info = "Dimension: ".$height."x".$width."x".$length;
				break;
		}
		$DB->query("INSERT INTO `products` (sku,name,price,info) VALUES ('$sku','$name','$price','$info')");
		header("Location: /");
	}
	public function delete(){
		$Cfg = new Config();
		$DB = new Database($Cfg->data()["host"],$Cfg->data()["user"],$Cfg->data()["pass"],$Cfg->data()["name"]);
		$list = $_POST["dellist"];
		foreach ($list as $card){
			$DB->query("DELETE FROM `products` WHERE id = ".$card);
		}
		echo "success";
	}
}