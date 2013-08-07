<?  header("Content-Type: text/html; charset=utf-8"); 
/*
						Раздел ВАКАНСИИ 
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Новости Своё Такси">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
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
		  <span class = "page-title">	
			Вакансии
		  </span><br>
			<ul>
				<li><a href="driver.php">Водитель такси</a></li>
				<li><a href="dispatcher.php">Диспетчер такси</a></li>
			</ul>
		<br>* Обращаем ваше внимание на то, что трудоустройство так же возможно 
				в городах, где работают службы такси наших партнеров: Ялта,  Симферополь,
				Киев, Донецк, Харьков, Горловка, Артемовск.<br>
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>