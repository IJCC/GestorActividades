<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$per = new PersonData();
	$per->evento = $_POST["evento"];
	$per->responsable = $_POST["responsable"];
	$per->fecha = $_POST["fecha"];
	$per->hora_inicio = $_POST["hora_inicio"];
	$per->hora_fin = $_POST["hora_fin"];
	$per->recursos = $_POST["recursos"];
	$per->add();
	Core::redir("./?view=eventos&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

	$per = PersonData::getById($_POST["_id"]);
	$per->evento = $_POST["evento"];
	$per->responsable = $_POST["responsable"];
	$per->fecha = $_POST["fecha"];
	$per->hora_inicio = $_POST["hora_inicio"];
	$per->hora_fin = $_POST["hora_fin"];
	$per->recursos = $_POST["recursos"];
	$per->update();
	Core::redir("./?view=eventos&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$per = PersonData::getById($_GET["id"]);
	$per->del();
	Core::redir("./?view=eventos&opt=all");

}
?>