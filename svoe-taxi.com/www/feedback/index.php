<? 
header("Content-Type: text/html; charset=utf-8");

include('kcaptcha/kcaptcha.php');
session_start();
require_once("config.php");


if ($_POST['act']== "y")
{
if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] ==  $_POST['keystring'])
{

if (isset($_POST['posName']) && $_POST['posName'] == "")
{
$statusError = "$errors_name";
}
elseif (isset($_POST['posEmail']) && $_POST['posEmail'] == "")
{
$statusError = "$errors_mailfrom";
}
elseif(isset($_POST['posEmail']) && !preg_match("/^([a-z,._,0-9])+@([a-z,._,0-9])+(.([a-z])+)+$/", $_POST['posEmail']))
{
$statusError = "$errors_incorrect";

unset($_POST['posEmail']);
}
elseif (isset($_POST['posRegard']) && $_POST['posRegard'] == "")
{
$statusError = "$errors_subject";
}
elseif (isset($_POST['posText']) && $_POST['posText'] == "")
{
$statusError = "$errors_message";
}

elseif (!empty($_POST))
{
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: $content  charset=$charset\r\n";
$headers .= "Date: ".date("Y-m-d (H:i:s)",time())."\r\n";
$headers .= "From: \"".$_POST['posName']."\" <".$_POST['posEmail'].">\r\n";
$headers .= "X-Mailer: My Send E-mail\r\n";

mail($mailto,$subject,$message,$headers);

unset($name, $posText, $mailto, $subject, $posRegard, $message);

$statusSuccess = "$send";
}

}else{
$statusError = "$captcha_error";
unset($_SESSION['captcha_keystring']);
}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Работа водители">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="styling.css">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
  <script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="../javascript/jquery-migrate-1.2.1.js"></script>
  <script type="text/javascript" src="../javascript/jscroller-0.4.js"></script>
  <script type="text/javascript" src="../javascript/running_line.js"></script>
 </head>
 <body>
	<div class="wrapper">		
		<? include_once "../blocks/header.php"; ?>
	<div class="main">	
		<? include_once "../blocks/sidebar.php"; ?>
				
	<div id="wr">		
		<div class="content">
		  <!--span class = "page-title">	
			Oбpaтнaя cвязь
		  </span-->	
		<div class="feedback-form">

	<p id="emailSuccess"><strong style="color:green;"><?php echo "$statusSuccess" ?></strong></p>
	<p id="emailError"><strong style="color:red;"><?php echo "$statusError" ?></strong></p>

	<div id="contactFormArea">
		<form action="./" method="post" id="cForm">
			<input type="hidden" name="act" value="y" />
				<fieldset>
				  <legend><strong>Oбpaтнaя cвязь</strong></legend>
				  <label for="posName"><b>Ваше имя:</b></label>
				   <input class="text" type="text" size="25" name="posName" id="posName"/>
				   
				   <label for="posEmail"><b>Ваш E-mail адрес:</b></label>			 
				    <input class="text" type="text" size="25" name="posEmail" id="posEmail"/>
					
				  <label for="posRegard"><b>Тема сообщения:</b></label>	
				    <input class="text" type="text" size="25" name="posRegard" id="posRegard"/>
					
				  <label for="posText"><b>Сообщение:</b></label>
				    <textarea cols="50" rows="10" name="posText" id="posText"></textarea>
					
				  <label for="posCaptcha"><b>Текст на изображении (цифры)</b>:</label>
					<img class="kcaptcha" id="posCaptcha" src="kcaptcha?<? echo session_name()?>=<?php echo session_id()?>" border="0" alt=""/>
				  <br>	
					<input class="text" type="text" size="25" name="keystring" id="keystring" /><br>
				  <br><label><input class="submit" type="submit" name="selfCC" id="selfCC" value=" Отправить " /></label>
				</fieldset>
		</form>
	</div>
</div> 
		 </div>
		<div class="img_bot"></div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>
