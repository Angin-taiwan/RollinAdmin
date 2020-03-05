<?php

class News extends DB
{
  public $NewsID;
  public $Title;

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
      ["$news->Title" , "$news->Description" ,  $news->NewsID]    // NOW() 使用UPDATE CURRENT_TIMESTAMP 自動更新當下時間
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

  function getAllCount() {
    return $this->selectDB(
      "SELECT COUNT(*) as Total FROM News;"  // 總共有幾筆資料
    )[0];
  }

  function getAllPage($startIndex = 0, $pageSize = 3) {  //從 0 筆開始 每頁3筆資料
    return $this->selectDB(
      "SELECT * FROM News ORDER BY NewsID ASC LIMIT ?, ? ;",
      [$startIndex, $pageSize]
    );
  }

  function getAllLikeCount($Title) {  //  COUNT(*) 回傳 資料筆數   ,  LIKE 後 變成  收尋 Title 回傳的資料筆數
    return $this->selectDB(
      "SELECT COUNT(*) Count FROM News WHERE Title LIKE CONCAT('%',?,'%') ;",
      [$Title]
    )[0];
  }

  function getAllLike($Title, $startIndex = 0, $pageSize = 3) {  // concat函數用來合併多個欄位的值
    return $this->selectDB(
      "SELECT * FROM News WHERE Title LIKE CONCAT('%',?,'%') ORDER BY NewsID ASC LIMIT ?, ? ;",
      [$Title, $startIndex, $pageSize]
    );
  }

}
