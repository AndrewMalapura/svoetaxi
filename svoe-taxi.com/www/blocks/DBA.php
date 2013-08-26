<?
Class DBA{ 
  //паметры подключения к бд
  
  var $db;                     //  
  var $sql;                    // результат запроса к БД 
  //соединение с базой данных при помощи функции mysql_connect()
  function connect(){
    $server = "localhost" ;  // сервер БД
    $db_login = "root";         // логин пользователя БД 
    $db_password = "";          // пароль для доступа к БД
    $this->db = mysql_connect($server, $db_login, $db_password) or die(mysql_error());
  //функция mysql_select_db() выбирает текущую 
  //базу данных с именем "svoetaxi"
    mysql_select_db("svoetaxi" ,$this->db);
  }
  
   function close_connection(){
	mysql_close($this->db);
  }
  /* ----------------------------------------------
		CRUD операции с таблицей rates (тарифы)
	------------------------------------------------	
  */
  // Создать новую запись
  function createRate($name,$min,$in_city,$out_city,$wait,$hour){
	$this->connect();
	$this->sql = mysql_query("insert into rates values(NULL,'".$name."','".$min."','".$in_city."','".$out_city."','".$wait."','".$hour."')") or die(mysql_error());
	$this->close_connection();
  }
  // Все данные из таблицы тарифы
  function readRates(){
	$this->connect();
	$this->sql = mysql_query("select * from rates") or die(mysql_error());
	$rates = array();
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ ){
	   $rates[$i] = $tablerows;
	}
	$this->close_connection();
	return $rates;
  }
  
  function updateRates($tariff){
	$this->connect();
	$sql = "UPDATE rates SET";
	$sql .= " name='".$tariff['name']."', ";
	$sql .= " up_to=".$tariff['up_to'].", ";
	$sql .= " city=".$tariff['city'].", ";
	$sql .= " out_city=".$tariff['out_city'].", ";
	$sql .= " void=".$tariff['void'].", ";
	$sql .= " hour=".$tariff['hour'];
	$sql .= " WHERE id='".$tariff['id']."'"; 
	  $query = mysql_query($sql);
	 //print_r($sql);
	if(! $query )
	{ 
		$this->close_connection();
		die('Could not update data: ' . mysql_error());
	}
	$this->close_connection();
  }
  
  // Удаление тарифа
  function deleteRate($rate_id){
	$this->connect();
	$this->sql = mysql_query("delete from rates where id='".$rate_id."'") or die(mysql_error());
	$this->close_connection();
  }
  // Выбор тарифа по id
  function findRate($rate_id){
	$this->connect();
	$this->sql = mysql_query("select * from rates where id='".$rate_id."'") or die(mysql_error());
	$rate = mysql_fetch_array($this->sql);
	$this->close_connection();
	return $rate;
  }
  /*---------------------------------- 
		Управление пользователями
   ------------------------------------		
				
   Все данные из таблицы users*/
  function getUsers(){
    $this->connect();
	$this->sql = mysql_query("SELECT * FROM users" ) or die(mysql_error());
	$users = array();
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ ){  $users[$i] = $tablerows; }
	$this->close_connection();
	return $users;
  }
  // Добавление нового пользователя
  function addUser($name,$login,$passwd,$role){
    $this->connect();
	$this->sql = mysql_query("insert into users values( NULL,'".$name."','" .$login."','".$passwd."','".$role."')") or die(mysql_error());
	$this->close_connection();
  }
  // Удаление пользователя
  function deleteUser($id_user){
    $this->connect();
	$this->sql = mysql_query("delete from users where id_user='".$id_user."'") or die(mysql_error());
	$this->close_connection();
  }
  // Выбрать пользователя по логину
  function getUser($user_login){
    $this->connect();
	$query = mysql_query("SELECT * FROM users WHERE login='".$user_login."'") or die(mysql_error());
	$user_data = mysql_fetch_array($query);
	$this->close_connection();
	return $user_data;
  }
  
  function updateUser($user){
   $this->connect();
  $sql = "UPDATE users SET";
  $sql .= " name='".$user['name']."', ";
  $sql .= " login='".$user['login']."', ";
if (isset($user['password']))  $sql .= "password='".$user['password']."', ";
  $sql .= " role='".$user['role']."'";
  $sql .= " WHERE id_user='".$user['id_user']."'"; 
	$query = mysql_query($sql);
if(! $query )
{ 
  $this->close_connection();
  die('Could not update data: ' . mysql_error());
}
	$this->close_connection();
	return "1";
  }
  
  function findUser($user_id){
    $this->connect();
	$query = mysql_query("SELECT * FROM users WHERE id_user='".$user_id."'") or die(mysql_error());
	$user_data = mysql_fetch_array($query);
	$this->close_connection();
	return $user_data;
  }
  
  /* ------------------------
  
		Галерея фото
	--------------------------	
  */ 
  function getCars(){
	$this->connect();
	$this->sql = mysql_query("SELECT * FROM cars order by fleet_name") or die(mysql_error());
	$cars = Array();
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ ){  $cars[$i] = $tablerows; }
	$this->close_connection();
	return $cars;
  }
  
  function findCar($ctg){
    //  echo "<script type-'javascript'>alert('Работает')</script>";
	$query = "SELECT * FROM cars where";
	if($ctg != ''){
	$query .=" fleet_name = '".$ctg."'"; 
	}else{
	$query = "SELECT * FROM cars order by fleet_name";
	}
	$this->connect();
	$this->sql = mysql_query($query) or die(mysql_error());
	$cars = Array();
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ ){  $cars[$i] = $tablerows; }
	$this->close_connection();
	return $cars;
  }
  
  function deleteCar($id_car){
	$this->connect();
	chmod($_SERVER['DOCUMENT_ROOT']."/image/gallery/", 0777);
	$file = $this->getPath($id_car);
	unlink($file);
	$query = mysql_query("DELETE FROM cars WHERE id='".$id_car."'") or die(mysql_error());
	$this->close_connection();
  }
  
  function getPath($id){
	 $q = mysql_query("SELECT img FROM cars WHERE id='".$id."'") or die(mysql_error());
	 $rez = mysql_fetch_array($q);
	 return $_SERVER['DOCUMENT_ROOT'].$rez['img'];
  }
  
  function addCar($owner,$call,$model,$img,$fleet_name){
	$this->connect();
	$this->sql = mysql_query("insert into cars values( NULL,'".$owner."','" .$call."','".$model."','".$img."','".$fleet_name."')") or die(mysql_error());
	$this->close_connection();
  }
  function updateCar($car){
    $this->connect();
	  $sql = "UPDATE cars SET ";
	  $sql .= " owner='".$car['owner']."', ";
	  $sql .= " dr_call='".$car['dr_call']."', ";
	  $sql .= " model='".$car['model']."', ";
	  $sql .= " img = '".$car['img']."', ";
	  $sql .= " fleet_name = '".$car['fleet_name']."'";
	  $sql .= " WHERE id='".$car['id']."'"; 
	  //print_r($sql);
	$query = mysql_query($sql)or die(mysql_error());
	
if(!$query )
{ 
  $this->close_connection();
  die('Could not update data: '.mysql_error());
}
	$this->close_connection();
  }
  
  // все категории картинок автомобилей
  function getCategories(){
	$this->connect();
	$this->sql = mysql_query("SELECT DISTINCT fleet_name FROM cars ORDER BY fleet_name") or die(mysql_error());
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ )
	{  $categories[$i] = $tablerows; }
	$this->close_connection();
	return $categories;
  }
  
  function showCar($category){
	$this->connect();
	$this->sql = mysql_query("SELECT * FROM cars where fleet_name='".$category."'") or die(mysql_error());
	$cars = Array();
	for( $i = 0; $tablerows = mysql_fetch_row($this->sql); $i++ ){  $cars[$i] = $tablerows; }
	$this->close_connection();
  return $cars;
  }
  
  function searchCar($id_car){
	  $this->connect();
		$query = mysql_query("SELECT * FROM cars WHERE id='".$id_car."'") or die(mysql_error());
		$car = mysql_fetch_array($query);
	  $this->close_connection();
    return $car;
  }
  
  // -------------- Running string --------------       
  
  function getRunning_Strings(){
	  $this->connect();
		$query = mysql_query("SELECT * FROM running_str") or die(mysql_error());
		$strings = mysql_fetch_array($query);
	  $this->close_connection();
	  print_r($strings);
    return ;
  }
  function addText($text){
	  $this->connect();
		$query = mysql_query("insert into running_str values( NULL,'".$text."')") or die(mysql_error());
		$car = mysql_fetch_array($query);
	  $this->close_connection();
  }
  function deleteRecord($id_rec){
	  $this->connect();
		$query = mysql_query("delete from running_str where id_user='".$id_rec."'") or die(mysql_error());
	  $this->close_connection();
    return $car;
  }
  
  
  } // end class
  ?>