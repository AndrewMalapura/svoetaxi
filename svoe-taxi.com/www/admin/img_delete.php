<?
session_start();
	include_once("../blocks/DBA.php");
    $dao = new DBA();
    // Инициируем сессию	
    if($_SESSION[name]!=""){
		if (isset( $_GET["id"]) ){
		$img_id = $_GET["id"];
		$dao->deleteCar($img_id);
		echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
		}
	}else{
		session_destroy();
		die("good bye !!!");
	}
?>