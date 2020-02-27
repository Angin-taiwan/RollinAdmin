<?php

class Brand extends DB {

  public $BrandID;
  public $BrandName;
  public $Description;

  function getAll() {
    return $this->selectDB("SELECT * FROM Brand ;");
  }

  function get($id) {
    return $this->selectDB("SELECT * FROM Brand WHERE BrandID = ? ;", [$id])[0];
  }

  function create($brand) {
    return $this->insertDB(
      "INSERT INTO Brand (BrandName, Description) VALUES (?, ?) ;",
      [$brand->BrandName, "$brand->Description"]
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
