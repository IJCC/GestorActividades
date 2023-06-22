<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	//$per = new CategoryData();
	$per = new TonerData();
	$per->name = $_POST["name"];
	$per->add();
	Core::redir("./?view=toners&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

	$per = TonerData::getById($_POST["_id"]);
	$per->name = $_POST["name"];
	$per->update();
	Core::redir("./?view=toners&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$per = TonerData::getById($_GET["id"]);
	$per->del();
	Core::redir("./?view=toners&opt=all");

}
?>