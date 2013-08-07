<? header("Content-Type: text/html; charset=utf-8");
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
			Для организаций
		  </span><br>		
		<span class="content-text">
		Наша компания осуществляет обслуживание корпоративных клиентов по наличному и безналичному расчету. 
		</span>
		Преимущества работы с нами, это:
	<ul class="policy-list">
		<li> всегда свободный многоканальный телефон, по которому легко дозвониться;</li>  
		<li> пунктуальные и вежливые водители-профи;</li>  
		<li> комфортабельные новые машины;</li>  
		<li> недорогое такси - в Артемовске более выгодных цен при аналогичном парке автомобилей вы не найдете.</li>
	</ul>
		<br>
		Приглашаем к сотрудничеству :  туристические агентства, торговые центры, гостиницы и др. организации г. Киева.   
			<br>
		По вопросам сотрудничества обращайтесь: <? echo "$contact"; ?>
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>