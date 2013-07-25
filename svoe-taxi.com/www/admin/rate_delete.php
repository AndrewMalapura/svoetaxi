<?
	session_start();
	include_once("../blocks/DBA.php");
    $dao = new DBA();
    // Инициируем сессию	
    if($_SESSION[name]!=""){
		if (isset( $_GET["id"]) ){
		$rate_id = $_GET["id"];
		$dao->deleteRate($rate_id);
		header('Location: ../admin/administration.php');
		}
	}else{
		session_destroy();
		die("good bye !!!");
	}

?>