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
      "INSERT INTO News (Title, Description , CreateDate , UpdateDate) VALUES (?, ? ,? ,?) ;",
      ["$news->Title", "$news->Description", "$news->CreateDate", "$news->UpdateDate"]
    );
  }
  //___________________________________________________________________________
  function update($news)
  {
    return $this->updateDB(
      "UPDATE News SET Title = ?, Description = ?, CreateDate = ?, UpdateDate = ? WHERE NewsID = ? ;",
      ["$news->Title", "$news->Description", "$news->CreateDate", "$news->UpdateDate", $news->NewsID]
    );
  }
  //___________________________________________________________________________
  function delete($newsID) {
    if (empty($newsID)) {return "error: ids is empty";}
    echo "wwwwwwwwwwwwwwwwwwwww";
    return $this->deleteDB(
      "DELETE FROM News WHERE NewsID = ?", $newsID 
      );
  }
  //___________________________________________________________________________
  function search($searchTerm)
  {
    return $this->selectDB("SELECT * FROM News WHERE Title LIKE '%$searchTerm%' ");
    // ["$news->searchTerm"];
  }
  //___________________________________________________________________________
  function checkdelete($ids = [])
  {
    if (empty($ids)) {
      return "error: ids is empty";
    }
    return $this->deleteDB("DELETE FROM News where NewsID IN ("  . str_repeat("?,", count($ids) -1 ) . "?);", $ids);
  }


}
