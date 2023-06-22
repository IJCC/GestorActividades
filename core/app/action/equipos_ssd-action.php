<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$per = new EquiposSSD();
	$per->equipo = $_POST["equipo"];
	$per->bm = $_POST["bm"];
	$per->numero_serie = $_POST["numero_serie"];
	$per->tipo_ssd = $_POST["tipo_ssd"];
	$per->usuario = $_POST["usuario"];
	$per->add();
	Core::redir("./?view=equipos_ssd&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){

	$per = EquiposSSD::getById($_POST["_id"]);
	$per->equipo = $_POST["equipo"];
	$per->bm = $_POST["bm"];
	$per->numero_serie = $_POST["numero_serie"];
	$per->tipo_ssd = $_POST["tipo_ssd"];
	$per->usuario = $_POST["usuario"];
	$per->update();

	/*if($_POST["password"]!=""){
	$per->password = sha1(md5($_POST["password"]));
		$per->update_passwd();
		Core::alert("Password Actualizado!");
	}
    */

	Core::redir("./?view=equipos_ssd&opt=all");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$per = EquiposSSD::getById($_GET["id"]);
	$per->del();
	Core::redir("./?view=equipos_ssd&opt=all");

}
?>