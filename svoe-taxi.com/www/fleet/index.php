<? header("Content-Type: text/html; charset=utf-8");
/*
					Раздел АВТОПАРК
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> своё такси </title>
  <meta name="description" content="Новости Своё Такси">
  <link rel="shortcut icon" href="../image/taxi.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="../css/flexslider.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="http://www.gismeteo.ua/static/css/informer2/gs_informerClient.min.css">
  <!-- link rel="stylesheet" href="../css/slider-style.css" type="text/css" -->
				<!-- JQuery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script type="text/javascript">window.jQuery || document.write('<script src="../javascript/jquery-1.10.1.min.js">x3C/script>')</script>
  <script type="text/javascript" src="../javascript/jquery-1.10.1.min.js"></script>
 
  
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
		<? include_once "../blocks/header.php"; ?>
	<div class="main">	
		<? include_once "../blocks/sidebar.php"; ?>
				
	<div id="wr">		
		<div class="content">
		  <span class = "page-title">	
			Наш автопарк
		  </span><br>	
		<span class="red-str">Одним из основных преимуществ «Своё Такси», помимо доступных цен, является внушительный автопарк.</span>
		<br><br>
		<?
		
	$name_category = $categories[$_GET[cat]][0];
	$foto = $dao->findCar($name_category);
	 $img_width = 250;
	 $img_height = 167;
	 if($_GET[cat] == ''){
	     $img_width = 100;
		 $img_height = 67;
	 }
	foreach($foto as $img){
		echo "<img class='foto-cars' src='".$img[4]."' alt='Нет фото' width='".$img_width."' height='".$img_height."' />";
	}
	
		?>
		<span class="content-text"> 
		<br>
		В Артёмовске по телефону Вы можете заказать такие автомобили, как Hyundai Sonata, Toyota Сamry, Lexus GS, Chevrolet lacetti,Volkswagen Multivan. 
		Стандарт класс, бизнес класс, ViP и минивены – все авто уже ждут Вашего заказа.
		<br>
		С нашей помощью Вы сможете просто доехать от одного объекта до другого, попасть в аэропорт в короткие сроки, встретить или проводить деловых партнеров.
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