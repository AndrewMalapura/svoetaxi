<? 
/**
   Главная страница 
**/
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
  <link rel="stylesheet" href="../css/flexslider.css" type="text/css">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
  <!-- link rel="stylesheet" href="../css/slider-style.css" type="text/css" -->
				<!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript">window.jQuery || document.write('<script src="../javascript/jquery-1.10.1.min.js">x3C/script>')</script>
  <script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="../javascript/jquery-migrate-1.2.1.js"></script>
  <script type="text/javascript" src="../javascript/jscroller-0.4.js"></script>
  <script type="text/javascript" src="../javascript/running_line.js"></script>
				<!-- FlexSlider -->
 
  <script type="text/javascript" src="../javascript/shCore.js"></script>
   <!-- Syntax Highlighter--> 
  <script type="text/javascript" src="../javascript/shBrushXml.js"></script>
  <script type="text/javascript" src="../javascript/shBrushJScript.js"></script>
  
  <!-- Optional FlexSlider Additions -->
  
  <script type="text/javascript" src="../javascript/jquery.mousewheel.js"></script>
  <script type="text/javascript" defer src="../javascript/jquery.flexslider.js"></script>
  
  <script type="text/javascript" charset="utf-8">
     $(window).load(function(){
       $('.flexslider').flexslider(
	   {
            animation: "fade",
			controlsContainer: '.flexslider'
			/*selector: ".slides > li", 
			directionNav: true,
			keyboard: true,
			,
			//mousewheel: true,
			pausePlay: true,  //Boolean: Создание динамического pause/play элемента
			pauseText: "Пауза", //String: Текста для кнопки "pause" элемента pausePlay
			playText:  "Далее", //String: Текст для кнопки "play" элемента pausePlay
			slideshow: true*/
		}
	   );
    });

  </script>	
 </head>
 <body>
	<div class="wrapper">		
		<? include_once "./blocks/header.php";
		//$path = $_SERVER['DOCUMENT_ROOT'];
		?>
	<div class="main">	
		<? include_once "./blocks/sidebar.php"; ?>
				
	<div id="wr">		
		<div class="content">
  	<p>	Мы гарантируем своевременную подачу автомобиля, сервис и комфорт. Заказать наше такси можно по телефону,
	в Skype, либо воспользовавшись он-лайн формой заказа. Впервые и только у нас – инновационные технологии такси
	по Европейским стандартам качества обслуживания. То, о чем говорят и чем пользуются люди, знающие цену времени
	и деньгам, ценящие качество и надежность.</p>
	<p>	Наверно не много людей задумывается над тем, как не легка была бы наша повседневная жизнь без такси. Конечно, нас
	иногда пугают на дорогах эти, постоянно куда-то спешащие, водители такси, но не стоит забывать о том, что они стараются
	только для нас! Чтобы именно мы смогли успеть решить свои проблемы! А как на счёт не опоздать на совещание, конференцию
	или деловую встречу? Вовремя успеть сесть на самолёт или поезд? Независимо от времени суток такси доставит Вас в любую
	часть г.Артемовска и близлежащих областей.</p>
	<p>	Помните, что пунктуальность – шаг к успеху!</p>
		<br>
		  	<div class="flexslider">
  <ul class="slides">
  <?
    if ($dir = opendir('image/slider/')) {
        $for_open=".jpg";
        $for_length=strlen($for_open);
        while (false !== ($file = readdir($dir))) {
            $len=strlen($file)-$for_length;
           if($len > 0 && strpos($file,$for_open,$len)==$len){
	echo "<li><img src='image/slider/$file' alt='image'></li>";			
			}
        }
    }
?>
  </ul>
		</div>
	
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "./blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>