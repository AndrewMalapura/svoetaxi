<?  session_start();?>
<!DOCTYPE html>
<html>
 <head>
  <title> администрирование сайта </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
 </head>
 <body>
<?
include_once("../blocks/DBA.php");
   $dao = new DBA();
   
   if(isset($_POST["submit"])){
	$login = $_POST["login"];
	$passwd = md5($_POST["password"]);
	$usr = array();
	$usr = $dao->getUser($login);
			if($usr[password] == $passwd){
			// open session
				
			// установка параметров сессии
				$_SESSION['name'] = $usr['name'];
			// переход на страницу администрирования
				$url = "../admin/administration.php";
				$timer = 0;
			    echo '<meta http-equiv="refresh" content="'.$timer.'; url='.$url.'">';
			}else{
				session_destroy(); // разрушаем сессию
				die("Неверный логин или пароль.<br>");
			}
   }
?>   
<div class="message"><p>Для входа введите логин и пароль</p></div>
<form method="post" action="../admin/" id="authorization">
	<input type="text" name="login" placeholder="|логин" required/><br>
	<input type="password" name="password" placeholder="|пароль" required/><br>
	<input type="submit" name="submit" value="Вход"/>
</form>
 </body>
</html>