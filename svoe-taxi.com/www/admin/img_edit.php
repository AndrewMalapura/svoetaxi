<? session_start(); 
if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/lib.php");
   // $dao = new DBA();
	$uploaddir = "/image/gallery/";
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
<?
   
   if(isset($_POST[car_change])){
        $car = $dao->searchCar($_POST['img_id']); // заполнение значениями из БД
		if( $_POST[owner]=='' && $_POST[call]=='' && $_POST[model]=='' && $_FILES[uploadbtn][name]=='' && $_POST[categor]==''){
			echo "<script language='JavaScript'>alert('Изменений нет')</script>";		
			//$car = $dao->searchCar($_POST['img_id']); // заполнение значениями из БД
		} else{
		$uploadfile = $uploaddir . basename($_FILES['uploadbtn']['name']);
		$oldfoto = $_SERVER['DOCUMENT_ROOT'].$_POST['oldimg'];
		    if($_POST[owner]!='') $car[owner] = $_POST[owner];
			if($_POST[call]!='')  $car[call] = $_POST[call];
			if($_POST[model]!='') $car[model] = $_POST[model];
			if($_POST[categor]!='') $car[fleet_name] = $_POST['categor'];
	echo '<pre>'; // загружаем новое фото
			if($uploadfile != ''){
			$car[img] = $uploadfile;
		if (move_uploaded_file($_FILES['uploadbtn']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$uploadfile)) 
			{
		    echo "Файл корректен и был успешно загружен.\n";
			  if (file_exists($oldfoto)) { unlink($oldfoto); } // удалить старый файл	
			}						
		        $dao->updateCar($car);
				print_r($car);
		} else {
			echo "Возможная атака с помощью файловой загрузки!\n";
		}
	echo "</pre>";
			}
   }else{
     $car = $dao->searchCar($_GET['id']);
   }
?>

<div class="edit-form">
<table>
	<form enctype="multipart/form-data" method="post" name="editcar" action="../admin/img_edit.php" class="change-admin" >
	<?
  echo "<input type='hidden' name='img_id' value='".$car['id']."'/>";
  echo "<tr><td><label for='owner' >Владелец:</label></td></tr>
		<tr><td><input id='owner' type='text' name='owner' placeholder='|".$car[owner]."' /></td></tr>
		<tr><td><label for='call' >Позывной:</label></td></tr>
		<tr><td><input id='call' type='text' name='call' placeholder='|".$car[call]."' /></td></tr>
		<tr><td><label for='model' >Модель</label></td></tr>
		<tr><td><input id='model' type='text' name='model' placeholder='|".$car[model]."' /></td></tr>
		<tr><td><label for='img-holdera' >Фото автомобиля</label></td></tr>"; ?>
	<tr><td>
	<div id="img-holder">
	 <div id="img-div">
		<? echo "<input id='oldimg' name='oldimg' type='hidden' value='".$car[img]."'>";
		   echo "<img id='imgcar' src='".$car[img]."' alt='Нет картинки'/>"; ?>		
	 </div>
			<input type="file" id="uploadbtn" name="uploadbtn" />
	</div>  
	</td></tr>
	<? 
  echo "<tr><td><label for='fleet_name' >Категория авто</label></td></tr>
		<tr><td>";
			$categories = $dao->getCategories();
		echo "<select name='categor' id='lstCategories' required>";
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
		echo "</td></tr>
		<tr><td><input type='submit' name='car_change' value='Принять' /></td></tr>
		<tr><td><input type='reset' value='Очистить' /></td></tr>";
	?>	
	</form>
	<tr><td><a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Главная страница</a></td></tr>
</table>
	</div>
  </body>
</html>