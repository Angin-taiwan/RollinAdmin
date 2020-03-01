<?php

class News extends DB {
  
  //_________________________________________________________________________
  function getAll(){
    return $this->selectDB("SELECT * FROM News");
  }
//___________________________________________________________________________
  function getNewsByID ($id){
    return $this->selectDB("SELECT * FROM News WHERE NewsID = ? ;", [$id])[0];
  }
//___________________________________________________________________________
function create($news) {
  return $this->insertDB(
    "INSERT INTO News (Title, Description , CreateDate , UpdateDate) VALUES (?, ? ,? ,?) ;",
    ["$news->Title", "$news->Description" ,"$news->CreateDate" ,"$news->UpdateDate"]
  );
}
//___________________________________________________________________________

//___________________________________________________________________________
function update($news) {
  return $this->updateDB(
    "UPDATE News SET Title = ?, Description = ?, CreateDate = ?, UpdateDate = ? WHERE NewsID = ? ;",
    ["$news->Title", "$news->Description" ,"$news->CreateDate" ,"$news->UpdateDate" , $news->NewsID]
  );
}
    


    // if (!isset ($ID)) die ("Parameter id not found.");
    // if (!is_numeric($ID)) die ("id not a number.");

    // $NewsID = $_POST["NewsID"];
    // $Title  = $_POST["Title"];
    // $Description = $_POST["Description"];
    // $CreateDate = $_POST["CreateDate"];
    // $UpdateDate = $_POST["UpdateDate"];
    // $commandText = 
    //     "update News"
    //   . "set NewsID = '{$NewsID}' "
    //   . "  , Title = '{$Title}'"
    //   . "  , Description = '{$Description}'"
    //   . "  , CreateDate = '{$CreateDate}'"
    //   . "  , UpdateDate = '{$UpdateDate}'"
    //   . " where NewsID = {$ID}";
    //   header("Location: newslist.php");
//___________________________________________________________________________
  function delete($NewsID) {
    if (empty($NewsID)) {return "error: ids is empty";}
      return $this->deleteDB("DELETE FROM News WHERE NewsID=?", $NewsID);
  }
//___________________________________________________________________________

//___________________________________________________________________________
}

