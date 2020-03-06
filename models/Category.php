<?php

$method = $_SERVER['REQUEST_METHOD'];
$url = explode("/", rtrim($_GET["url"], "/") );

class Category extends DB {
  public $CategoryID;
  public $CategoryName;
  public $ParentID;

  function getAll() {
    return $this->selectDB(
      "SELECT * FROM Category ORDER BY CategoryID ASC"
    );
  }

  function create($category) {
    $categoryName = trim($category->categoryName);
    if ($categoryName=="") {return "error: 類別名稱不可為空白";}
    $parentID = NULL;
    if (!is_null($category->parentID) && is_int($category->parentID)) {
      $parentID = $category->parentID;
    }
    return $this->insertDB(
      "INSERT INTO Category (CategoryName, ParentID) VALUES (?, ?) ;",
      [$categoryName, $parentID]
    );
  }

  function update($category) {
    return $this->updateDB(
      "UPDATE Category SET ParentID = ? WHERE CategoryID = ? ;",
      ["$category->ParentID", "$category->CategoryID"]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM Category WHERE CategoryID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }
}

?>