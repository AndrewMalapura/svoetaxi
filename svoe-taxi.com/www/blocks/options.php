<?
$contact = "<span class='red-str'>(050)-701-11-18  (066)-178-87-68</span>";

$main_items = array(
"главная"=>"/",
"пассажирам"=>"../passenger/",
"автопарк"=>"../fleet/",
"сотрудничество"=>"../partnership/",
"вакансии"=>"../jobs/",
"контакты"=>"../contacts/");


include_once "DBA.php";
	$dao = new DBA();
	$categories = $dao->getCategories();	
	$fleet_arr = array();
	$iterator = 0;
	foreach($categories as $ctg){
	  $fleet_arr[$ctg[0]] = "/fleet/index.php?cat=".$iterator++;
	  
	}
//        Определение пунктов субменю в многомерном массиве
$submenu_items = array(
		"главная"=>null,
		"пассажирам"=>array(
					"Заказ такси"=>"'/passenger/online_order.php'",
					"Тарифы"=>"'/passenger/tariff.php'",
					"Свадебный кортеж"=>"'/passenger/bridal.php'",
					"Права и обязанности пассажира и водителя такси"=>"'/passenger/policy.php'"),
		"автопарк"=>$fleet_arr
		/*array(
					"Стандарт класс"=>"'/fleet/standart.php'",
				//	"Бизнес класс"=>"'/fleet/business.php'",
				//	"Премиум класс"=>"'/fleet/premium.php'",
					"Микроавтобусы"=>"'/fleet/miniven.php'",
					"Свадебный кортеж"=>"'/fleet/wedding.php'")*/,
					
		"сотрудничество"=>array(
					"Для организаций"=>"'/partnership/company.php'",
					"Реклама"=>"'/partnership/reklama.php'",
					"Наши партнёры"=>"'/partnership/our_partners.php'", 
					"Наши клиенты"=>"'/partnership/our_clients.php'"),
		"вакансии"=>array(
					"Водитель такси"=>"'/jobs/driver.php'",
					"Диспетчер такси"=>"'/jobs/dispatcher.php'"),
		"контакты"=>null
);
?>