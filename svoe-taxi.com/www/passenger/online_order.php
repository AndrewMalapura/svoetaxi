<? header("Content-Type: text/html; charset=utf-8");
//				Заказ такси
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Новости Своё Такси">
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
			Заказ такси
		  </span><br>
			<div id="online-order">
			<iframe align="middle" scrolling="no" 
			frameborder="0" src="http://waptaxi.com/page_order.php?gid=21&amp;h=400&amp;partner=241C7747C484FDE6009503DA17F491B1" 
			name="iframebox" id="iframebox"></iframe>
		 </div></div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>