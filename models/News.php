<?php
//INSERT INTO News (Title , Description , CreateDate , UpdateDate) VALUES ("DC", "DC Description" , "2020-02-02 , 2020-02-03");

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
var_dump($link);
$result = mysqli_query($link, "set names utf8");


mysqli_select_db($link, `rollin`);
$commandText = "select * from News";
mysqli_query($link, $commendText);

$result = mysqli_query($link, $commendText);
$row = mysqli_fetch_assoc($result);



class News extends DB {
//___________________________________________________________________________
  function getAll(){
    return $this->select("SELECT * FROM News");
  }
//___________________________________________________________________________
  function getNewsByID ($ID){
    if (!is_numeric($ID))
    	die( "id is not a number." );

    global $link;
    $result = mysqli_query($link , "select * from News where NewsID =" . $ID);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
  }
//___________________________________________________________________________
  function insertNews (){
    global $link;

    $NewsID = $_POST["NewsID"];
    $Title  = $_POST["Title"];
    $Description = $_POST["Description"];
    $CreateDate = $_POST["CreateDate"];
    $UpdateDate = $_POST["UpdateDate"];
    $commandText = 
        "insert into products "
      . "set NewsID = '{$NewsID}' "
      . "  , Title = '{$Title}'"
      . "  , Description = '{$Description}'"
      . "  , CreateDate = '{$CreateDate}'"
      . "  , UpdateDate = '{$UpdateDate}'";
    $result = mysqli_query($link, $commandText); 
    
    echo $result;
  }
//___________________________________________________________________________
  function updateNews($ID) {
    if (!isset ($ID)) die ("Parameter id not found.");
    if (!is_numeric($ID)) die ("id not a number.");

    global $link;

    $NewsID = $_POST["NewsID"];
    $Title  = $_POST["Title"];
    $Description = $_POST["Description"];
    $CreateDate = $_POST["CreateDate"];
    $UpdateDate = $_POST["UpdateDate"];
    $commandText = 
        "update News"
      . "set NewsID = '{$NewsID}' "
      . "  , Title = '{$Title}'"
      . "  , Description = '{$Description}'"
      . "  , CreateDate = '{$CreateDate}'"
      . "  , UpdateDate = '{$UpdateDate}'"
      . " where NewsID = {$ID}";
      mysqli_query($link , $commandText);

      echo "update : ". $ID;
  }
//___________________________________________________________________________

  function deleteNews ($ID){
    if (!isset ($ID)) die ("Parameter id not found.");
    if (!is_numeric($ID)) die ("id not a number.");

    global $link;

    $commendText =
    "delete from News"
    . "where NewsID = {$ID}";
    mysqli_query($link , $commendText);

    echo "delete : ". $ID;
  }
//___________________________________________________________________________



}
?>
