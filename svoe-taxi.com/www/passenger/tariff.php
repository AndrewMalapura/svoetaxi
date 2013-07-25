<? 
//				Тарифы
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
		  		
		<span class="content-text">
		<span class = "page-title">	
			Наши тарифы
		  </span><br>
		Наша служба стабильно работает на рынке заказа такси уже несколько лет и делает все возможное, 
		чтобы обеспечить своим клиентам высокий уровень сервиса по доступным ценам.<br><br>
		  </span>   
		<table class="my-table">
<?		
		include_once("../blocks/DBA.php");
		$dao = new DBA();
		$rates = $dao->readRates();
		echo "<tr id='head'><th>Наименование</th><th> Мин. стоимость<br>(первые 2км.)</th><th>По городу<br>(за 1км.)</th><th>За городом<br>(за 1км.)</th><th>Ожидание<br>(1 мин.)</th><th>Почасовая<br>(мин. 2 часа)</th></tr>";
		foreach($rates as $val){
		echo "<tr><td class='rate-name'>$val[1]</td><td>$val[2]</td><td>$val[3]</td><td>$val[4]</td><td>$val[5]</td><td>$val[6]</td></tr>";
		}
?>
		</table>
		 <br>
		 <span class="content-text">
	* по решению администрации службы "Своё TAXI", тариф может быть изменен, в связи с сложными погодными условиями.<br>
	* по желанию клиента, тариф может быть увеличен, что существенно сократит время подачи автомобиля .<br>
	* Задача "Своё TAXI" состоит в том, что бы Вы вовремя приехали в аэропорт или на вокзал. Операторы контролируют своевременное прибытие автомобиля к клиенту. 
	При необходимости водитель такси встретит Вас с табличкой в зале прилёта аэропорта или на вокзале, быстро и с комфортом доставят Вас по указанному адресу. 
	Сделав заказ ,  Вы получаете качественное и своевременное транспортное обслуживание, по доступным ценам.<br>
		</span>
		 </div>
		<div class="img_bot"></div>
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	 		
	</div>
	</div> <!-- end wrapper -->
	
 </body>
</html>