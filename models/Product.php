<?php

class Product extends DB {

  public $ProductID ;
  public $ProductName ;
  public $BrandID ;
  public $CategoryID ;
  public $PDescription ;
  public $Discontinued ;
  public $UnitPrice ;
  public $Date ;
  public $UnitInStock;

// 計數
  function getAllCount() {
    return $this->selectDB(
      "SELECT COUNT(*) as Total FROM product;"
    )[0];
  }
// 搜尋+計數
function getAllLikeCount($whatyouwhant) {
  return $this->selectDB(
    "SELECT COUNT(*) Count FROM product WHERE ProductName LIKE CONCAT('%',?,'%') ;",
    [$whatyouwhant]
  )[0];
}
function getAllLike($ProductName) {
  // $sort = $sort == "DESC" ? "DESC" : "ASC"; 
  // $column_white_list = ['ProductID','ProductName','Description'];
  // $column = in_array($column, $column_white_list) ? $column : $column_white_list[0];
  return $this->selectDB(
    "SELECT *, ps.ProductID P_ID,SUM(UnitInStock) TotalStock from productstock as ps 
    right outer join Product as p on p.ProductID = ps.ProductID   
    left outer join brand as b on p.BrandID = b.BrandID           
    left outer join category as c on p.CategoryID = c.CategoryID   
          WHERE ProductName LIKE CONCAT('%',?,'%') GROUP BY p.ProductID ;",
    [$ProductName]
  );
}
// List
  function getAll(){
    return $this->selectDB(
      "SELECT *, ps.ProductID P_ID,SUM(UnitInStock) TotalStock from productstock as ps -- 庫存
      right outer join Product as p on p.ProductID = ps.ProductID    -- 商品
			left outer join brand as b on p.BrandID = b.BrandID            -- 品牌
			left outer join category as c on p.CategoryID = c.CategoryID   -- 類別
            GROUP BY p.ProductID;"
    );
  }
// Detail
  function getDetail($id) {
    return $this->selectDB(
      "SELECT p.* , b.BrandName, c.CategoryName , SUM(UnitInStock) TotalStock FROM Product as p
      join brand as b on p.BrandID = b.BrandID
      join category as c on p.CategoryID = c.CategoryID
      left outer join productstock as ps on p.ProductID = ps.ProductID
      WHERE p.ProductID = ? GROUP BY p.ProductID ;", [$id])[0];
  }
// stock
  function getStock($id){
    return $this->selectDB(
      "select * from product as p 
          left outer join brand as b on p.BrandID = b.BrandID 
          left outer join category as c on p.CategoryID = c.CategoryID 
          left outer join productstock as ps on p.productID = ps.ProductID 
          WHERE p.ProductID = ? ", [$id]
    );
  }
// C
  function createProduct($Product) {
    $ProductName = trim($Product->ProductName);
    return $this->insertDB(
      "INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, 
      `UnitPrice`) VALUES (?,?,?,?,?,?) ;", 
      ["$Product->ProductName" , "$Product->BrandID" , $Product->CategoryID , $Product->PDescription , 
      "$Product->Discontinued" , "$Product->UnitPrice" ]
    );
  }

  function updateProduct($Product) {
    return $this->updateDB(
      "UPDATE Product SET ProductName = ?,UnitPrice = ? , PDescription = ? WHERE ProductID = ? ;",
      ["$Product->ProductName", "$Product->UnitPrice", "$Product->PDescription", $Product->ProductID]
    );
  }

function findmyBrandName(){
  return $this->selectDB(
    "select BrandID, BrandName from Brand;"
  );
}

function findmyMainCategoryName(){
  return $this->selectDB(
  "select * from Category WHERE ParentID IS NULL;");
}

function findmyCldCategoryName($id=null){
  if($id==null){
    return $this->selectDB(
      "select * from Category WHERE ParentID IS NOT NULL;");
  } else{
    return $this->selectDB(
      "select * from Category WHERE ParentID = $id;");
  }

}

function findmySizeName($id){
  // 
}


  function delete($id) {

  }

}
