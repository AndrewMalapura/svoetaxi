<? header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Своё Такси">
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
		  <!--span class = "page-title">	
			<h1>Сотрудничество реклама</h1>
		  </span-->		
		<span class="content-text">
		Предлагаем Вам разместить рекламу на обороте визитных карточек службы "Своё TAXI".<br>
   Визитные карточки распространяются водителями такси. Высокая эффективность такой рекламы объясняется как интересом водителя в повторном заказе, 
   так и желанием пассажира сохранить номер телефона службы такси в виде удобной визитной карточки.
   Важно, что потребители услуг такси - это активная часть населения. Возрастной диапазон пассажиров такси соответствует продуктивному и трудоспособному возрасту, 
   со средним и выше уровнем доходов.
<br>
	В настоящее время мы готовы организовать распространение полиграфии по Киеву, а так же в службах наших коллег: 
    TAXI "СВОЁ" г. Ялта, TAXI "СВОЁ" г. Симферополь, TAXI "ВСЕГДА" г. Донецк, TAXI "СВОЁ" г. Харьков, 
    TAXI "СВОЁ" г. Артемовск, TAXI "ДОНБАСС" г. Горловка,  TAXI "ДОМОЙ" г. Артемовск.
<br>
	По вопросам сотрудничества обращайтесь: <? echo "$contact"; ?>

		</span>
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>