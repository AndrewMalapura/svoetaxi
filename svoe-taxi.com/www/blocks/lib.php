<?
  include_once("../blocks/DBA.php");
  $dao = new DBA(); 
  
  function categoryList(){
  $categories = $dao->getCategories();
    return $categories;
  }
  
?>