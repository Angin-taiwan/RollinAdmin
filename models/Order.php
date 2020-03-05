<?php

class Order extends DB {

    public $OrderID;
    // public $choice = $data ->(OrderID,UserName,ShippedDate);
    // public $UserName;
    // public $OrderName;
    // public $Description;

  function getAllCount() {
    return $this->selectDB(
       "SELECT COUNT(*) as Total FROM `Order`;"
     )[0];
  }

  function getAllLikeCount($OrderID) {
    return $this->selectDB(
      "SELECT COUNT(*) Count FROM `Order` O
      join `User` U on (U.UserId = O.UserId)  
      WHERE OrderID LIKE CONCAT('%',?,'%') ;",
      [$OrderID]
    )[0];
  }

  function getAllLike($OrderID, $startDate , $endDate , $startIndex = 0, $pageSize = 3) {
    return $this->selectDB(
      "SELECT O.*, U.UserName, Pay.PaymentName, P.ProductName FROM `Order` O 
      join `User` U on (U.UserId = O.UserId)
      join Orderdetail Od on (Od.OrderID   = O.OrderID)
      join Product P on (P.ProductID = Od.ProductID)
      join Payment Pay on (Pay.PaymentID = O.PaymentID)
      WHERE UserName LIKE CONCAT('%',?,'%')
      and OrderDate >= ? AND OrderDate <= ? ORDER BY OrderID ASC LIMIT ?, ? ;",
      [$OrderID, $startDate , $endDate , $startIndex, $pageSize]
    );
  }

  function getOrderByorderdate($startDate,$endDate) {
    return $this->selectDB("SELECT * FROM `Order` O
    join User      U on (U.UserID    = O.UserID)
    join Payment   Pay on (Pay.PaymentID = O.PaymentID)
    join recipient r on (r.OrderID   = O.OrderID)
    join Orderdetail Od on (Od.OrderID   = O.OrderID)
    join Product P on (P.ProductID = Od.ProductID)
    join shipping      S on (S.shippingID    = O.shippingID)
    WHERE OrderDate <= ?
      AND OrderDate >= ? ;", [$startDate,$endDate]);
  }
    

  function getAll($startIndex = 0, $pageSize = 3) {
    return $this->selectDB("SELECT * from `Order` O
    join `User` U on (U.UserId = O.UserId)
    join Orderdetail Od on (Od.OrderID   = O.OrderID)
    join Product P on (P.ProductID = Od.ProductID)
    join Payment Pay on (Pay.PaymentID = O.PaymentID)
    ORDER BY O.OrderID
    asc LIMIT ?, ? ;",[$startIndex, $pageSize]
    );
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


  //還沒做好
  function updateshipping($id) {
    return $this->updateDB(
      "UPDATE `Order` SET ShippedDate = ? where orderID = ? ",
      [date("Y-m-d h:i:sa"), $id]
      // ["$brand->BrandName", "$brand->Description", $brand->BrandID]
    );
  }

  function delete($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "DELETE FROM `Order` WHERE OrderID IN (" . str_repeat("?,", count($ids) - 1) . "?);",
      $ids);
  }

}
