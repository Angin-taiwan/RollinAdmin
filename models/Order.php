<?php

class Order extends DB {

  public $OrderID;
  public $OrderName;
  public $Description;

  function getAll() {
    return $this->selectDB("SELECT * FROM `Order` ;");
    // return $this->selectDB("SELECT * FROM Order ;");
  }

  function get($id) {
    return $this->selectDB("SELECT * FROM `Order` WHERE OrderID = ? ;", [$id])[0];
  }

  function create($Order) {
    return $this->insertDB(
      "INSERT INTO `Order` (OrderName, Description) VALUES (?, ?) ;",
      [$Order->OrderName, "$Order->Description"]
    );
  }

  function update($Order) {
    return $this->updateDB(
      "UPDATE `Order` SET OrderName = ?, Description = ? WHERE OrderID = ? ;",
      ["$Order->OrderName", "$Order->Description", $Order->OrderID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM `Order` WHERE OrderID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }

}
