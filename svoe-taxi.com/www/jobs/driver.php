<?  header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Работа водители">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
 </head>
 <body>
	<div class="wrapper">		
		<? include_once "../blocks/header.php"; ?>
	<div class="main">	
		<? include_once "../blocks/sidebar.php"; ?>
				
	<div id="wr">		
		<div class="content">
		  <span class = "page-title">	
			Водитель такси
		  </span><br>	
		Приглашаются на работу водители-профессионалы со своим автотранспортом.
	<br>
	Требования к водителю:   
	<br>
	<ul class="policy-list">
		<li>без вредных привычек;</li> 
		<li>отличное знание Артёмовска;</li> 
		<li>пунктуальность;</li> 
		<li>вежливость;</li> 
		<li>стрессоустойчивость;</li>   
		<li>опыт работы в такси приветствуется;</li> 
		<li>возраст от 22 лет до 60 лет;</li>
		</ul>
		<br>
	По вопросу трудоустройства обращайтесь по номеру: <? echo "$contact"; ?>	

		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>