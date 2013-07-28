<?
	session_start();
	
	   // Инициируем сессию	
   if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   $user_data = $dao->findUser($_POST['usr_id']);
   //print_r($user_data);
   if(isset($_POST['change'])){
	  
     if($_POST['name']!='')  { $user_data['name'] = $_POST['name'];}
     if($_POST['login']!='')   $user_data['login'] = $_POST['login'];
	 if(($_POST['password']!='')AND($_POST['password'] == $_POST['r_password'])){
      $user_data['password'] = md5($_POST['password']);
      } else {
	  $user_data['password'] = null;	
      }
	 $dao->updateUser($user_data);
   echo "<script language='JavaScript'>location.replace('./administration.php')</script>";
   }
?>
<!DOCTYPE HTML>
<html>
   <head>
      	<title>Пользователи</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
   </head>
  <body>
<div class="edit-form">
<table>
	<form method="post" name="editform" action="../admin/usr_edit.php" class="change-admin">
	<?
  echo "<input type='hidden' name='usr_id' value='".$_GET['id']."'/>";	
	$dao = new DBA();
	$user_data = $dao->findUser($_GET['id']);
  echo "<tr><td><label for='name' >Имя пользователя:</label></td></tr>
		<tr><td><input id='name' type='text' name='name' placeholder='|".$user_data[name]."' /></td></tr>
		<tr><td><label for='login' >Логин:</label></td></tr>
		<tr><td><input id='login' type='text' name='login' placeholder='|".$user_data[login]."' /></td></tr>
		<tr><td><label for='pass' >Изменить пароль</label></td></tr>
		<tr><td><input id='pass' type='password' name='password' placeholder='|новый пароль' /></td></tr>
		<tr><td><label for='pass1' >Повторите новый пароль</label></td></tr>
		<tr><td><input id='pass1' type='password' name='r_password' placeholder='|повторите пароль' /></td></tr>
		<tr><td><input type='submit' name='change' value='Принять' /></td></tr>
		<tr><td><input type='reset' value='Очистить' /></td></tr>";
	?>	
	</form>
	<tr><td><a class="back_admin" title="Вернуться на страницу администрирования" href="../admin/administration.php">Главная страница</a></td></tr>
</table>
	</div>

  </body>
</html>