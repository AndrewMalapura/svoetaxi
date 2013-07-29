<?
 // редактирование данных автопарка
 session_start();
	
	   // Инициируем сессию	
   if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   $car = $dao->searchCar($_POST['id']);
?>
	<html>
   <head>
      	<title>Автопарк</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
   </head>
  <body>
<div class="edit-form">
<table>
	<form method="post" name="editform" action="../admin/img_edit.php" class="change-admin">
	<?
  echo "<input type='hidden' name='img_id' value='".$_GET['id']."'/>";
	$car = $dao->searchCar($_GET['id']);
  echo "<tr><td><label for='owner' >Владелец:</label></td></tr>
		<tr><td><input id='owner' type='text' name='owner' placeholder='|".$car[owner]."' /></td></tr>
		<tr><td><label for='call' >Позывной:</label></td></tr>
		<tr><td><input id='call' type='text' name='call' placeholder='|".$car[call]."' /></td></tr>
		<tr><td><label for='model' >Модель</label></td></tr>
		<tr><td><input id='model' type='text' name='model' placeholder='|новый пароль' /></td></tr>
		<tr><td><label for='img' >Фото</label></td></tr>
		<tr><td><input id='img' type='text' name='img' placeholder='|повторите пароль' /></td></tr>
		<tr><td><label for='fleet_name' >Категория авто</label></td></tr>
		<tr><td><input id='fleet_name' type='text' name='fleet_name' placeholder='|повторите пароль' /></td></tr>
		<tr><td><input type='submit' name='change' value='Принять' /></td></tr>
		<tr><td><input type='reset' value='Очистить' /></td></tr>";
	?>	
	</form>
	<tr><td><a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Главная страница</a></td></tr>
</table>
	</div>

  </body>
</html>