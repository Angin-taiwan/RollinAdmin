<?php

class Order extends DB {

    // public $OrderID;
    // public $OrderName;
    // public $Description;

  function getAll() {
    return $this->selectDB("SELECT * from `Order` O
    join `User` U on (U.UserId = O.UserId)
    join Orderdetail Od on (Od.OrderID   = O.OrderID)
    join Product P on (P.ProductID = Od.ProductID)
    join Payment Pay on (Pay.PaymentID = O.PaymentID);");
    // return $this->selectDB("SELECT * FROM Order ;");
  }

  function getOrderById($id) {
    return $this->selectDB("SELECT * FROM `Order` O
    join User      U on (U.UserID    = O.UserID)
    join Payment   Pay on (Pay.PaymentID = O.PaymentID)
    join recipient r on (r.OrderID   = O.OrderID)
    join Orderdetail Od on (Od.OrderID   = O.OrderID)
    join Product P on (P.ProductID = Od.ProductID)
    join shipping      S on (S.shippingID    = O.shippingID)
    WHERE O.OrderID = ? ;", [$id])[0];
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
