<?
	session_start();
	include_once("../blocks/DBA.php");
    $dao = new DBA();
    // Инициируем сессию	
    if($_SESSION[name]!=""){
		if (isset( $_GET["id"]) ){
		$user_id = $_GET["id"];
		$dao->deleteUser($user_id);
		echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
		}
	}else{
		session_destroy();
		die("good bye !!!");
	}
?>