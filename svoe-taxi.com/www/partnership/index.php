<?  header("Content-Type: text/html; charset=utf-8");
// Сотрудничество
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Новости Своё Такси">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
   <!-- CSS for slidesjs.com example
  <link rel="stylesheet" href="../css/example.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="../css/slider-style.css"> -->
  <script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="../javascript/jquery.slides.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#slides').slidesjs({
        width: 600,
        height: 400,
        play: {
          active: true,
		  effect: "fade",
          auto: true,
          interval: 7000,
          swap: true
        }
      });
    });
  </script>
 </head>
 <body>
	<div class="wrapper">		
		<? include_once "../blocks/header.php"; ?>
	<div class="main">	
		<? include_once "../blocks/sidebar.php"; ?>
				
	<div id="wr">		
		<div class="content">
		  <span class = "page-title">	
			Сотрудничество
		  </span><br>		
		<span class="content-text">
		"Своё TAXI" приглашает к сотрудничеству  государственные и коммерческие организации. Наш опыт работы позволил нам 
		разработать гибкие схемы скидок, учитывающие всю специфику и сложность украинского  рынка, а так же индивидуальность каждого клиента.
		</span>
		Сотрудничество с компанией "Своё TAXI" дает Вам ряд преимуществ:
		<ul class="policy-list">
<li>своевременное и качественное предоставление услуг;</li>
<li>самые низкие цены на рынке лицензированных таксомоторных услуг г. Киева;</li>
<li>высокий комфорт и вежливое обслуживание;</li>
<li>выполнение заказа в максимально короткие сроки;</li> 
<li>время ожидания такси не превышает 10 минут;</li>
		</ul><br>
Вам будет выгодно заключить договор на транспортное обслуживание с компанией "Своё TAXI".<br>
По вопросам сотрудничества обращайтесь: <? $contact ?>
		
<!--		<div id="slides">
  < ?
    if ($dir = opendir('../image/slider/')) {
        $for_open=".jpg";
        $for_length=strlen($for_open);
        while (false !== ($file = readdir($dir))) {
            $len=strlen($file)-$for_length;
           if($len > 0 && strpos($file,$for_open,$len)==$len){
	echo "<img src='../image/slider/$file' alt='Нет изображения'>";			
			}
        }
    }
?>
		</div-->
		
		
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>