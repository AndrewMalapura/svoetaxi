<?
	session_start();
	// Соответствие регуляному выражению( маске)
	function isValid($value){
		$expression = "/^[1-9]?[0-9]+([,\.][0-9]){0,3}/";
	   return preg_match($expression, $value);
	}
	// преобразование в decimal format
	function unit ($value, $decimal_point = 2) {
		return $value = number_format (str_replace (",", ".", trim ($value)), $decimal_point);
	}
	   // Инициируем сессию	
    if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   if(isset($_POST[rate_change])){  
		$tariff_data = $dao->findRate($_POST['rate_id']);
    if($_POST[name] != ''){$tariff_data[name] = $_POST[name];}
	if($_POST[min] != ''){$tariff_data[min] = $_POST[min];}
	if($_POST[city] != ''){$tariff_data[city] = $_POST[city];}
	if($_POST[out_city] != ''){$tariff_data[out_city] = $_POST[out_city];}
	if($_POST[void] != ''){$tariff_data[void] = $_POST[void];}
	if($_POST[hour] != ''){$tariff_data[hour] = $_POST[hour];}
   }else{
	$tariff_data = $dao->findRate($_GET["id"]);
   }
   ?>
<!DOCTYPE HTML>
<html>
   <head>
      	<title>Тарифы</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../style.css" />
   </head>
  <body>
<div class="edit-form">
<table>
	<form method="post" action="../admin/rate_edit.php" class="change-admin">
	<?
  echo "<input type='hidden' name='rate_id' value='".$tariff_data[id]."'/>";
  echo "<tr><td><label for='name' >Название тарифа: </label></td></tr>
		<tr><td><input id='name' type='text' name='name' placeholder='|".$tariff_data[name]."' /></td></tr>
		<tr><td><label for='min' >За первые 2 км.: </label></td></tr>
		<tr><td><input id='min' type='text' name='login' placeholder='|".$tariff_data[up_to]."' /></td></tr>
		<tr><td><label for='city' >По городу: </label></td></tr>
		<tr><td><input id='city' type='text' name='city' placeholder='".$tariff_data[city]."' /></td></tr>
		<tr><td><label for='out_city' >За город: </label></td></tr>
		<tr><td><input id='out_city' type='text' name='out_city' placeholder='|".$tariff_data[out_city]."' /></td></tr>
		<tr><td><label for='void' >Простой: </label></td></tr>
		<tr><td><input id='void' type='text' name='void' placeholder='|".$tariff_data[void]."' /></td></tr>
		<tr><td><label for='hour' >Почасовая оплата: </label></td></tr>
		<tr><td><input id='hour' type='text' name='hour' placeholder='|".$tariff_data[hour]."' /></td></tr>
		<tr><td><input class='buttn' type='submit' name='rate_change' value='Принять' /></td></tr>
		<tr><td><input class='buttn' type='reset' value='Очистить' /></td></tr>";
	?>
	</form>
	<tr><td><a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Главная страница</a></td></tr>
</table>		
	</div>
  </body>
</html>