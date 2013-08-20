<?
 // редактирование данных автопарка
 session_start();
	
	   // Инициируем сессию	
   if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   $car = $dao->searchCar($_POST['id']);
?>
<!DOCTYPE HTML>
	<html>
   <head>
      	<title>Коррекция автопарк</title>
		<script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
	    <script type="text/javascript" src="../javascript/jquery-migrate-1.2.1.js"></script>
		<script type="text/javascript" src="../javascript/upload-img.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css" />
   </head>
  <body>
<div class="edit-form">
<table>
	<form enctype="multipart/form-data" method="post" name="editcar" action="../admin/img_edit.php" class="change-admin" >
	<?
  echo "<input type='hidden' name='img_id' value='".$_GET['id']."'/>";
	$car = $dao->searchCar($_GET['id']);
  echo "<tr><td><label for='owner' >Владелец:</label></td></tr>
		<tr><td><input id='owner' type='text' name='owner' placeholder='|".$car[owner]."' /></td></tr>
		<tr><td><label for='call' >Позывной:</label></td></tr>
		<tr><td><input id='call' type='text' name='call' placeholder='|".$car[call]."' /></td></tr>
		<tr><td><label for='model' >Модель</label></td></tr>
		<tr><td><input id='model' type='text' name='model' placeholder='|".$car[model]."' /></td></tr>
		<tr><td><label for='file' >Фото автомобиля</label></td></tr>";?>
	<tr><td>
	<div id="img-holder">
	 <div id="drop-files">
		<? echo "<img src='".$car[img]."' alt='Нет картинки'/>"; ?>		
	 </div>
			<input type="file" id="uploadbtn" />
	</div>  
	</td></tr>
<? echo "<tr><td><label for='fleet_name' >Категория авто</label></td></tr>
		<tr><td><input id='fleet_name' type='text' name='fleet_name' placeholder='|категория авто' /></td></tr>
		<tr><td><input type='submit' name='change' value='Принять' /></td></tr>
		<tr><td><input type='reset' value='Очистить' /></td></tr>";
	?>	
	</form>
	<tr><td><a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Главная страница</a></td></tr>
</table>
	</div>

  </body>
</html>