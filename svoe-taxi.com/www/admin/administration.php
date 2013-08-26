<?
 session_start();
 echo "<!DOCTYPE HTML>";
?>
<html>
 <head>
  <title> администрирование сайта </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="../javascript/cookies.js"></script> 
  <script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="../javascript/jquery-migrate-1.2.1.js"></script>
  <script type="text/javascript" src="../javascript/admin.js"></script> 
  <link rel="stylesheet" type="text/css" href="../style.css" />
  
 </head>
 <body>
<?
	// Соответствие регуляному выражению( маска ввода )
	function isValid($val){
		$expression = "/^[1-9]?[0-9]+([,\.][0-9]){0,3}/";
	   return preg_match($expression, $val);
	}
	// преобразование в decimal format
	function unit ($value, $decimal_point = 2) {
		return $value = number_format (str_replace (",", ".", trim ($value)), $decimal_point);
}

	include_once("../blocks/lib.php");
   // Инициируем сессию	
   if($_SESSION[name]!=""){					// Добавить пользователя
		  if(isset($_POST["registration"]) and ($_POST["password"] == $_POST["r_password"]))
		  {
			$name = $_POST["name"];
			$login = $_POST["login"];
			$passwd = md5($_POST["password"]);
			$role = "administrator";
			$dao->addUser($name,$login,$passwd,$role);
			echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
			}
					//	Добавить тарифный план
		  if(isset($_POST["submit"]))
		  {
					$not_valid = " class='error-valid' ";
					$name_tariff = $_POST["tariff_name"];
					$min = $_POST["min"];
					  $err_min = !isValid($min) ? $not_valid : ""; // если не валидны добавляем класс error
					$in_city = $_POST["in_city"];
					  $err_in_city = !isValid($in_city) ? $not_valid : "";
					$out_city = $_POST["out_city"];
					  $err_out_city = !isValid($out_city) ? $not_valid : "";
					$wait = $_POST["wait"];
					  $err_wait = !isValid($wait) ? $not_valid : "";
					$hour = $_POST["hour"];
					  $err_hour = !isValid($hour) ? $not_valid : "";
			$valid = isValid($min)*isValid($in_city)*isValid($out_city)*isValid($wait)*isValid($hour);
			if($valid){
					$name_tariff = $_POST["tariff_name"];
					$min = unit($_POST["min"]);
					$in_city = unit($_POST["in_city"]);
					$out_city = unit($_POST["out_city"]);
					$wait = unit($_POST["wait"]);
					$hour = unit($_POST["hour"]);
					$dao->createRate($name_tariff,$min,$in_city,$out_city,$wait,$hour);
					echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
			}else{		
					
					echo "<script type-'javascript'>alert('Данные не валидны !!!')</script>";
			}
		  }
		  if(isset($_POST["load"])){
		  
		  if ($_FILES['file']['error'] > 0) {
  echo "Transfer error: ".$_FILES['file']['error']." - upload cancelled<br>";
		} elseif ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 40000))
		  {
		  
		   $path = "/image/gallery/";
		   $owner = $_POST['owner'];
		   $call = $_POST['call'];
		   $model = $_POST['model'];
		   $img = $path . $_FILES["file"]["name"];
		   $fleet_name = $_POST['categor'];
			/*	echo
				echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				echo "Type: " . $_FILES["file"]["type"] . "<br>";
				echo "Size: " . round($_FILES["file"]["size"] / 1024, 2) . " Kb<br>";
				echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			*/
				if (file_exists("upload/" . $_FILES["file"]["name"]))
				  {
				  echo $_FILES["file"]["name"] . " already exists. ";
				  }
				else
				  {
				move_uploaded_file($_FILES["file"]["tmp_name"],
				  $_SERVER['DOCUMENT_ROOT'].$path . $_FILES["file"]["name"]);
				  
				$dao->addCar($owner,$call,$model,$img,$fleet_name);
				  }
				
		 // echo "<script type-'javascript'>alert('загрузка файла')</script>";
		  }
	 }
	 if(isset($_POST["find-categor"])){
		//$owner = $_POST["find-owner"];
		//$call = $_POST["find-call"];
		//$model = $_POST["find-model"];
		$fleet_name = $_POST["find-categor"];
	 // echo $fleet_name ;
	 
	 }
	 
	 
	}else{
		session_destroy();
		die("good bye !!!");
	}
?>
<div class="wrapper"> 
<div id="command-div">
    <input id="brts" class="command-button" type="button" name="b_rate" value="управление тарифами" onclick="showDiv(this.id)"/>
	<input id="busr" class="command-button" type="button" name="b_user" value="управление пользователями" onclick="showDiv(this.id)"/>
	<input id="bcar" class="command-button" type="button" name="b_car" value='галерея "Aвтопарк"' onclick="showDiv(this.id)"/>
	<input id="brec" class="command-button" type="button" name="b_rec" value='Рекламные объявления' onclick="showDiv(this.id)"/>
	<br>
</div>
<div class="admin-page" id="usr" >
	<div class="admin-form">
	<form method="post" action="../admin/administration.php" class="new-admin">
		<legend><strong>Добавить админа</strong></legend><br>
		<input type="text" name="name" placeholder="|имя пользователя" required/><br>
		<input type="text" name="login" placeholder="|логин" required/><br>
		<input type="password" name="password" placeholder="|пароль" required/><br>
		<input type="password" name="r_password" placeholder="|повторите пароль" required/><br>
		<input type="submit" name="registration" value="Добавить"/><input type="reset" value="Очистить">
	</form>
	</div>
	<div class="admin-data-div">
	<?
		$users = $dao->getUsers();
		echo "<form id='usr' method='POST'>";
		echo "<table class='admin-table'>";
		echo "<tr id='head'><th>name</th><th>login</th><th>role</th><th>Edit</th><th>Delete</th></tr>";
		foreach($users as $value){
		echo "<tr><td>$value[1]</td><td>$value[2]</td><td>$value[4]</td>
			  <td><a href='../admin/usr_edit.php?id=".$value[0]."' title=\"изменить\"><img src='../image/document-edit.png' alt='edit'></a></td>
			  <td><a href='../admin/usr_delete.php?id=".$value[0]." ' title=\"удалить\"><img src='../image/deletered.png' alt='delete'></td></a></tr>";
		}
		echo "</table>";
		echo "</form>";
	?>
	</div>
</div>
<div class="admin-page" id="trf">
	<div class="admin-form">
	<form method="post" action="../admin/administration.php" class="new-rate">
		<legend><strong>Новый тариф</strong></legend><br>
<?		
		
		echo "<input type='text' name='tariff_name' placeholder='|название тарифного плана'  value = '".$name_tariff."' required/><br>
		      <input type='text' ".$err_min." name='min' placeholder='|минимальная стоимость' value='".$min."' required/><br>
		      <input type='text' ".$err_in_city." name='in_city' placeholder='|по городу (1 км.)' value='".$in_city."' required/><br>
			  <input type='text' ".$err_out_city."  name='out_city' placeholder='|за город (1 км.)' value='".$out_city."' required/><br>
		      <input type='text' ".$err_wait." name='wait' placeholder='|ожидание (1 мин.)' value='".$wait."' required/><br>
		      <input type='text' ".$err_hour." name='hour' placeholder='|почасовая оплата' value='".$hour."' required/><br>";
 ?>
		<input type="submit" name="submit" value="Добавить"/><input type="reset" value="Очистить">
	</form>
	</div>
	<div class="admin-data-div">
	<?
		$rates = $dao->readRates();
		echo "<form id='rts' method='POST'>";
		echo "<table class='admin-table'>";
		echo "<tr id='head'><th>Наименование</th><th>Мин. стоимость</th><th>По городу</th><th>За городом</th><th>Ожидание</th><th>Почасовая</th><th>Edit</th><th>Delete</th></tr>";
		foreach($rates as $val){
		echo "<tr><td>$val[1]</td><td>$val[2]</td><td>$val[3]</td><td>$val[4]</td><td>$val[5]</td><td>$val[6]</td>
			  <td><a href='../admin/rate_edit.php?id=".$val[0]."' title=\"изменить\"><img src='../image/document-edit.png' alt='edit'></a></td>
			  <td><a href='../admin/rate_delete.php?id=".$val[0]."'  title=\"удалить\"><img src='../image/deletered.png' alt='delete'></td></a></tr>";
		}
		echo "</table>";
		echo "</form>";
	?>
	</div>
</div>
<div class="admin-page" id="cars" >
	<div class="admin-form">
		<div id="add-img">
	  <form enctype="multipart/form-data" method="post" action="../admin/administration.php" class="new-car" >
		<legend><strong>Добавить картинку в галерею</strong></legend><br>
		<input type="text" name="owner" placeholder="|владелец" required /><br> 
		<input type="text" name="call" placeholder="|позывной" required /><br>
		<input type="text" name="model" placeholder="|модель" required /><br>
		<?
			$categories = $dao->getCategories();
		echo "<select name='categor' id='lstCategories' onchange='onChange()' required>";
			$val=0;
			$hand = "свой вариант";
			if(count($categories)){
			foreach($categories as $category){
			echo "<option value='".$category[0]."' >$category[0]</option>";
			}
			echo "<option value='".$hand."' >$hand</option>";
			} else {
			 echo "<option value='' ></option>";
			 echo "<option value='".$hand."' >$hand</option>";
			}
		?>
             </select>
		<div id="img-holder" class="image-place"></div><br/>
		<input type="hidden" name="MAX_FILE_SIZE" value="40000" /> <!-- максимал размер 40 кБ-->
		<input type="file" name="file" id="file" required /><br>	
	    <input type="submit" name="load" value="Принять"/><input type="reset" value="Очистить"/>
	  </form>
	    </div><br>
		
	</div>
	<div class="admin-data-div">
	  <div id="find">
	   <form id='find-form' method='POST' action='../admin/administration.php'>
				<legend><strong>Показать категорию </strong></legend>
		<?
		    echo "<select name='find-categor' id='fndCategories' onchange='sortCar(this.form)'>";
			echo "<option value='Все категории' >Все категории</option>";
			foreach($categories as $category){
			$opt = "<option value='".$category[0]."' ";
			if($fleet_name == $category[0]){$opt .= " selected='selected'>$category[0]</option>";}
			else{$opt .= ">$category[0]</option>";};
			echo $opt;
			}
		?>
             </select><br>
				<!--input type="submit" name="find-submit" value="Поиск"/-->

	  </form><br>
		</div>
     	<?
		
		if($fleet_name == "Все категории") $fleet_name = '';
				$cars = $dao->findCar($fleet_name);
		echo "<form id='car-form' method='POST'>";
					foreach($cars as $value){
						echo "<div class='iholder'><img src='".$value[4]."' alt='Нет фото' class='fleet-img'/>
							<div class='description'><span class='red-str'>позывной:</span> $value[2]<br>
							  <span class='red-str'>владелец:</span> $value[1]<br>
							  <span class='red-str'>модель:</span> $value[3]<br>
							  <span class='red-str'>категория:</span> $value[5]<br>
							  <a href='../admin/img_edit.php?id=".$value[0]."' title=\"изменить\"><img src='../image/document-edit.png' alt='edit'></a>
							  <a href='../admin/img_delete.php?id=".$value[0]." ' title=\"удалить\"><img src='../image/deletered.png' alt='delete'></a>
						     </div></div>";}
		echo "</form>"; ?>
	</div>
	</div>
<div class="admin-page" id="reclame" >
	<div id="running-text-editor">
		<form id="running-text-form" method='POST' action='../admin/administration.php'>
		<textarea rows="5" cols="30" name="quote" wrap="physical" placeholder="* Введите текст бегущей строки"></textarea><br/>
		<input type="submit" name="new_text" value="Добавить"/><input type="reset" value="Очистить"/>
		</form>
		<div id="view-saved-text" ></div>
	</div>
	<div id="view-banners">
		Просмотр каталога с баннерами
	<div>
</div>
</div>		
 </body>
</html>