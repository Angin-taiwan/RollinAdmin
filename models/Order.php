<?php

class Order extends DB {

  public $orderID;
  // public $BrandName;
  // public $Description;

  function getAll() {
    return $this->selectDB("SELECT * FROM Order ;");
  }

  function get($id) {
    return $this->selectDB("SELECT * FROM Order WHERE OrderID = ? ;", [$id])[0];
  }

  // function create($orderID) {
  //   return $this->insertDB(
  //     "INSERT INTO Order () VALUES (?, ?) ;",
  //     [$orderID->OrderID, "$orderID->Description"]
  //   );
  // }

  function update($orderID) {
    return $this->updateDB(
      "UPDATE order SET orderID = ?, Description = ? WHERE BrandID = ? ;",
      ["$orderID->BrandName", "$orderID->Description", $orderID->BrandID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM Brand WHERE BrandID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }

}
