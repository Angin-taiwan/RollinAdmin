<?php

class Brand extends DB {

  public $BrandID;
  public $BrandName;
  public $Description;

  function getAllCount() {
    return $this->selectDB(
      "SELECT COUNT(*) as Total FROM Brand;"
    )[0];
  }

  function getAll($startIndex = 0, $pageSize = 20) {
    return $this->selectDB(
      "SELECT * FROM Brand ORDER BY BrandID ASC LIMIT ?, ? ;",
      [$startIndex, $pageSize]
    );
  }

  function getAllLikeCount($brandName) {
    return $this->selectDB(
      "SELECT COUNT(*) Count FROM Brand WHERE BrandName LIKE CONCAT('%',?,'%') ;",
      [$brandName]
    )[0];
  }

  function getAllLike($brandName, $column = "BrandID", $sort = "ASC", $startIndex = 0, $pageSize = 20) {
    $sort = $sort == "DESC" ? "DESC" : "ASC"; 
    $column_white_list = ['BrandID','BrandName','Description'];
    $column = in_array($column, $column_white_list) ? $column : $column_white_list[0];
    return $this->selectDB(
      "SELECT * FROM Brand WHERE BrandName LIKE CONCAT('%',?,'%') ORDER BY $column $sort LIMIT ?, ? ;",
      [$brandName, $startIndex, $pageSize]
    );
  }

  function get($id) {
    return $this->selectDB(
      "SELECT * FROM Brand WHERE BrandID = ? ;",
      [$id])[0];
  }

  function create($brand) {
    $brandName = trim($brand->BrandName);
    $description = trim($brand->Description);
    if ($brandName=="") {return "error: 品牌名稱不可為空白";}
    return $this->insertDB(
      "INSERT INTO Brand (BrandName, Description) VALUES (?, ?) ;",
      [$brandName, $description]
    );
  }

  function update($brand) {
    return $this->updateDB(
      "UPDATE Brand SET BrandName = ?, Description = ? WHERE BrandID = ? ;",
      ["$brand->BrandName", "$brand->Description", $brand->BrandID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM Brand WHERE BrandID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }

}
