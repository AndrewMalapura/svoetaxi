<?
	session_start();
	
	   // Инициируем сессию	
   if(($_SESSION[name] == "")OR($_SESSION[name] == null)) die("Good Bye !!!");
   include_once("../blocks/DBA.php");
   $dao = new DBA();
   $user_data = $dao->findUser($_POST['usr_id']);
   //print_r($user_data);
   if(isset($_POST['change'])){
	  
     if($_POST['name']!='')  { $user_data['name'] = $_POST['name'];} else { echo $user_data['name']; }
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
      	<title>Edit</title>
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
  echo "<tr><td><label for='name' >текущее имя: ".$user_data[name]."</label></td><td><input id='name' type='text' name='name' placeholder='|новое имя пользователя' /></td></tr>
		<tr><td><label for='login' >текущий логин: ".$user_data[login]."</label></td><td><input id='login' type='text' name='login' placeholder='|новый логин' /></td></tr>
		<tr><td><label for='pass' >изменить пароль</label></td><td><input id='pass' type='password' name='password' placeholder='|новый пароль' /></td></tr>
		<tr><td><label for='pass1' >повторите новый пароль</label></td><td><input id='pass1' type='password' name='r_password' placeholder='|повторите пароль' /></td></tr>
		<tr><td colspan='2' style=' background-repeat: repeat-x; background-image: url(../image/line.png);'/></td></tr>
		<tr><td colspan='2'><input class='buttn' type='submit' name='change' value='Принять' /><input class='buttn' type='reset' value='Очистить' /></td></tr>";
	?>
	</form>
</table>
	</div>
  </body>
</html>