<?php

class Category extends DB {
  public $CategoryID;
  public $CategoryName;
  public $ParentID;

  function getAll() {
    return $this->selectDB(
      "SELECT * FROM Category ORDER BY CategoryID ASC"
    );
  }

  function getParents() {
    return $this->selectDB(
      "SELECT * FROM Category WHERE ParentID IS NULL ORDER BY CategoryID ASC"
    );
  }

  function getChildren($parentID) {
    return $this->selectDB(
      "SELECT * FROM Category WHERE ParentID = ? ORDER BY CategoryID ASC",
      [$parentID]
    );
  }

  function create($category) {
    return $this->insertDB(
      "INSERT INTO Category (CategoryName, ParentID) VALUES (?, ?) ;",
      [$category->CategoryName, $category->ParentID]
    );
  }

  function update($category) {
    return $this->updateDB (
      "UPDATE Category SET CategoryName = ?, ParentID = ? WHERE CategoryID = ? ;",
      [$category->CategoryName, $category->ParentID, $category->CategoryID]
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