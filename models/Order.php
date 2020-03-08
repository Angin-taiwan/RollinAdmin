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

  function getAllLikeCount($keywords,$Searchtext, $startDate, $endDate , $pageStartIndex = 0, $pageSize = 3) {
    // echo $keywords;
    echo $Searchtext;
    var_dump($startDate);
    var_dump($endDate);
    return $this->selectDB(
      "SELECT COUNT(*) Count FROM `Order` O
     join `User` U on (U.UserId = O.UserId)
      join Orderdetail Od on (Od.OrderID   = O.OrderID)
      join Product P on (P.ProductID = Od.ProductID)
      join Payment Pay on (Pay.PaymentID = O.PaymentID)
      WHERE  $keywords LIKE CONCAT('%$Searchtext%') 
      and OrderDate >= '$startDate' AND OrderDate <= '$endDate'
      ORDER BY O.OrderID ASC LIMIT $pageStartIndex, $pageSize;");
  }

  function getAllLike($ordertype,$keywords,$Searchtext, $startDate, $endDate,  $pageStartIndex = 0, $pageSize = 3) {
    echo $ordertype ;  
    echo $keywords;
    echo $Searchtext;
    // var_dump($startDate);
    // var_dump($endDate);
    
    return $this->selectDB(
      "SELECT O.*, U.UserName, Pay.PaymentName, P.ProductName FROM `Order` O 
      join `User` U on (U.UserId = O.UserId)
      join Orderdetail Od on (Od.OrderID   = O.OrderID)
      join Product P on (P.ProductID = Od.ProductID)
      join Payment Pay on (Pay.PaymentID = O.PaymentID)
      WHERE $ordertype and 
      $keywords LIKE CONCAT('%$Searchtext%')  
      and OrderDate >= '$startDate' AND OrderDate <= '$endDate'
      ORDER BY OrderID ASC LIMIT $pageStartIndex, $pageSize ;",);
  }
  // -- and OrderDate >= '?' AND OrderDate <= '?' 

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


  //顯示未理貨訂單
  function getOrderByUnshipped($id) {
    return $this->selectDB("SELECT * FROM `Order` O
    join User      U on (U.UserID    = O.UserID)
    join Payment   Pay on (Pay.PaymentID = O.PaymentID)
    join recipient r on (r.OrderID   = O.OrderID)
    join Orderdetail Od on (Od.OrderID   = O.OrderID)
    join Product P on (P.ProductID = Od.ProductID)
    join shipping      S on (S.shippingID    = O.shippingID)
    WHERE O.OrderID = ?
    and shippedDate is null ;", [$id])[0];
  }


  function create($Order) {
    return $this->insertDB(
      "INSERT INTO `Order` (OrderName, Description) VALUES (?, ?) ;",
      [$Order->OrderName, "$Order->Description"]
    );
  }



  //理貨時間相關

  function updatechecked($id) {
    return $this->updateDB(
      "UPDATE `Order` SET CheckedDate = current_timestamp() where orderID = $id ",
      // ["$brand->BrandName", "$brand->Description", $brand->BrandID]
    );
  }

  function checkedupdatechecked($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "UPDATE `Order` SET checkedDate = current_timestamp() where orderID in (" . str_repeat("?,", count($ids) -1) . "?);",
      $ids);
  }




  //取消訂單相關

  function updateCancel($id) {
    return $this->updateDB(
      "UPDATE `Order` SET CancelDate = ? where orderID = ? ",
      [date("Y-m-d h:i:sa"), $id]
      // ["$brand->BrandName", "$brand->Description", $brand->BrandID]
    );
  }
  function checkedupdatecancel($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "UPDATE `Order` SET CancelDate = current_timestamp() where orderID in (" . str_repeat("?,", count($ids) -1) . "?);",
      $ids);
  }
  



  //出貨訂單相關
  function checkedupdateshipping($ids = []) {
    if (empty($ids)) {return "error: ids is empty";}
    return $this->deleteDB(
      "UPDATE `Order` SET ShippedDate = current_timestamp() where orderID in (" . str_repeat("?,", count($ids) -1) . "?);",
      $ids);
  }

  function updateshipping($id) {
    return $this->updateDB(
      "UPDATE `Order` SET ShippedDate = current_timestamp() where orderID = ? ",
      [$id]
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
