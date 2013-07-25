<?  header("Content-Type: text/html; charset=utf-8"); ?>
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
			Диспетчер такси
		  </span><br>		
		<span class="content-text"><br>
		Необходимые качества и навыки для работы диспетчеров в нашей службе:
		</span>
		<ul class="policy-list">
			<li>хорошее владение русским и украинским языком обязательно;</li>
			<li>хорошая дикция (отсутствие ярко-выраженных дефектов речи);</li>
			<li>владение персональным компьютером на уровне опытного пользователя и достаточная скорость ввода с клавиатуры;</li>
			<li>навык доброжелательно-корректного общения;</li>
			<li>способность управлять своими эмоциями в сложных условиях (например, в праздники, когда такси пользуются повышенным спросом);</li>
			<li>умение быстро и точно воспринимать информацию;</li>
			<li>способность работать в стрессовых ситуациях;</li>
			<li>ценится умение ориентироваться по карте Артёмовска.</li>
		</ul><br>
		Мы предлагаем:
		<ul class="policy-list">
			<li>комфортно-оборудованные рабочие места;</li>
			<li>сменный график работы;</li>
			<li>премиальные проценты, в зависимости от объема выполненной работы;</li>
			<li>достойную оплату труда.</li>
		</ul><br>
		По вопросам трудоустройства обращайтесь: <? echo "$contact"; ?>	
		 </div>
		<div class="img_bot">
		
		</div>
	</div>		
	</div>	
     <? include_once "../blocks/footer.php"; ?>
	</div> <!-- end wrapper -->
	
 </body>
</html>