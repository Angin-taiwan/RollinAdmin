<?php

class News extends DB
{

  //__________________________________________________________________________
  function getAll()
  {
    return $this->selectDB("SELECT * FROM News");
  }
  //___________________________________________________________________________
  function getNewsByID($id)
  {
    return $this->selectDB("SELECT * FROM News WHERE NewsID = ? ;", [$id])[0];
  }
  //___________________________________________________________________________
  function create($news)
  {
    return $this->insertDB(
      "INSERT INTO News (Title , Description , CreateDate , UpdateDate) VALUES (?, ?, NOW(), NOW()) ;",
      ["$news->Title", "$news->Description",]
    );
  }
  //___________________________________________________________________________
  function update($news)
  {
    return $this->updateDB(
      "UPDATE News SET Title = ? , UpdateDate = NOW() , Description = ? WHERE NewsID = ? ;",
      ["$news->Title" , "$news->Description" ,  $news->NewsID]
    );
  }
  //___________________________________________________________________________
  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM News WHERE NewsID IN (" . str_repeat("?,", count($ids) -1) . "?);",
      $ids);
  }
  //___________________________________________________________________________
  function search($searchTerm)
  {
    return $this->selectDB("SELECT * FROM News WHERE Title LIKE '%$searchTerm%' ");
    // ["$news->searchTerm"];
  }
  //___________________________________________________________________________

}
