<?
	session_start();
	// Соответствие регуляному выражению( маске)
	function isValid($value){
	   if($value == '') return 0;
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
      $validData = 1;
		$tariff_data = $dao->findRate($_POST['rate_id']);
    if($_POST[name] != ''){$tariff_data[name] = $_POST[name];}
	if(isValid($_POST[min])){$tariff_data[up_to] = unit($_POST[min]);}
	elseif($_POST[min] != '') {$validData = 0;}
	if(isValid($_POST[city])){$tariff_data[city] = unit($_POST[city]);}
	elseif($_POST[city] != '') {$validData = 0;}
	if(isValid($_POST[out_city])){$tariff_data[out_city] = unit($_POST[out_city]);}
	elseif($_POST[out_city] != '') {$validData = 0;}
	if(isValid($_POST[void])){$tariff_data[void] = unit($_POST[void]);}
	elseif($_POST[void] != '') {$validData = 0;}
	if(isValid($_POST[hour])){$tariff_data[hour] = unit($_POST[hour]);}
	elseif($_POST[hour] != '') {$validData = 0;}
	if($validData){
	  $dao->updateRates($tariff_data);
	echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
	 } else {echo "<script language='JavaScript'>alert('Данные не валидны');</script>"; }
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
		<tr><td><input id='min' type='text' name='min' placeholder='|".$tariff_data[up_to]."' /></td></tr>
		<tr><td><label for='city' >По городу: </label></td></tr>
		<tr><td><input id='city' type='text' name='city' placeholder='|".$tariff_data[city]."' /></td></tr>
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