<?
	session_start();
	   // Инициируем сессию	
    if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   $tariff_data = $dao->findRate($_GET['id']);
?>
<!DOCTYPE HTML>
<html>
   <head>
      	<title>Edit</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../style.css" />
   </head>
  <body>
<div class="edit-form">
<table>
	<form method="post" action="../admin/usr_edit.php" class="change-admin">
	<?
  echo "<tr><td><label for='name' >Название тарифа: ".$tariff_data[name]."</label></td><td><input id='name' type='text' name='name' placeholder='|новое название тарифа' /></td></tr>
		<tr><td><label for='min' >За первые 2 км.: ".$tariff_data[up_to]."</label></td><td><input id='min' type='text' name='login' placeholder='|первые 2 км.' /></td></tr>
		<tr><td><label for='city' >По городу: ".$tariff_data[city]."</label></td><td><input id='city' type='text' name='city' placeholder='|по городу' /></td></tr>
		<tr><td><label for='out_city' >За город: ".$tariff_data[out_city]."</label></td><td><input id='out_city' type='text' name='out_city' placeholder='|за городом' /></td></tr>
		<tr><td><label for='void' >Простой:  ".$tariff_data[void]."</label></td><td><input id='void' type='text' name='void' placeholder='|тариф за простой' /></td></tr>
		<tr><td><label for='hour' >Простой:  ".$tariff_data[hour]."</label></td><td><input id='hour' type='text' name='hour' placeholder='|почасовая оплата' /></td></tr>
		<tr><td colspan='2'><input class='buttn' type='submit' name='change' value='Принять' /><input class='buttn' type='reset' value='Очистить' /></td></tr>";
	?>
	</form>
</table>		
	</div>
	<a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Возврат на предыдущую страницу</a>
  </body>
</html>