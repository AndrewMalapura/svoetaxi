<?
/**
   Шапка сайта
**/
// Определение пунктов главного меню в массиве
include_once "options.php";
// блок header
echo '<div class="header">
<a href="/"><img src="../image/header.png" alt=""></a> 
</div>
<div class="top-menu">
 <ul>'; 
    $link = $_SERVER["REQUEST_URI"]; // ссылка загруженной страницы
	$arr = explode("/",$link);       // разкладываем загруженную страницу в массив
 // Вывод главного меню
   foreach($main_items as $key=>$value){
    $path = explode("/",$value);     // элемент на котором указатель
	$url = '"'.$value.'"';
	if($arr[1] === $path[1]){        // сравнивае м каталоги разделов(всё URI -> arr[0]=("")/arr[1]="folder"/arr[2]=php_file)
	  echo '<li class="active" >';   // меняем стиль
	  echo "<a href=$url>$key</a></li>";
	  $current_key = $key;          // индекс текущей страницы
	  }
	else
      echo "<li><a href=$url>$key</a></li>";
 } 
echo '</ul></div>'; // конец блока header
  // субменю
if(isset($submenu_items[$current_key])){
echo '<div class="section-menu">';
echo '<ul>';
if($current_key=="автопарк"){
   if(isset($_GET[cat])) $itr = 0; else $itr = 'none';
foreach($submenu_items[$current_key] as $item=>$uri){
//$tag = ("'".$link."'" === $uri) ? '<li class="active-submenu">' : '<li>'; // если это текущая страница 
$tag = ($_GET[cat] == $itr++) ? '<li class="active-submenu">' : '<li>'; // если это текущая страница 
echo $tag;
echo "<a href='".$uri."'>$item</a>";
echo '</li>';
} // end foreach
}else{
foreach($submenu_items[$current_key] as $item=>$uri){
$tag = ("'".$link."'" === $uri) ? '<li class="active-submenu">' : '<li>'; // если это текущая страница 
echo $tag;
echo "<a href=$uri>$item</a>";
echo '</li>';
}
} // end else
echo '</ul></div>';
}

/**
    Выводит таблицу автопарк
	$category - категория авто */
	function ViewCarTable($category){
	$cars = $dao->showCar($category);
			//	print_r($cars);
		echo "<table class='img-table'>";	
		 
		   $column_pointer = 0;
		foreach($cars as $single_car){   
				switch($column_pointer){
					case 1:
					{ 	
						echo "<td><img src='..".$single_car[4]."' width='240' height='150' alt='Нет изображения'/>
							 <br>$single_car[1]
							 </td>";
						$column_pointer++;
						break;
					}
					case 2:	
					{		
						
						echo "<td><img src='..".$single_car[4]."' width='240' height='150' alt='Нет изображения'/>
						<br>$single_car[1]
						</td>";
						$column_pointer = 0;
						echo "</tr>";
						break;
					}
					case 0:
					{	  
						echo "<tr>";
						echo "<td><img src='..".$single_car[4]."' width='240' height='150' alt='Нет изображения'/>
						<br>$single_car[1]</td>";
						$column_pointer++;
					}
				}
				//print_r($column_pointer);
			
		}
		if( $column_pointer == 2) {echo "<td></td></tr>";} elseif ($column_pointer == 1) {echo "<td></td><td></td></tr>";}
		echo "</table>";
}
 ?>
 <div class="col_title"></div>