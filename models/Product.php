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


  // $BrandID_Name = [];

  function getAll(){
    return $this->selectDB(
      "select *, ps.ProductID P_ID,SUM(UnitInStock) TotalStock from productstock as ps -- 庫存
      right outer join Product as p on p.ProductID = ps.ProductID    -- 商品
			left outer join brand as b on p.BrandID = b.BrandID            -- 品牌
			left outer join category as c on p.CategoryID = c.CategoryID   -- 類別
            GROUP BY p.ProductID;"
    );
  }
  function getStock($id){
    return $this->selectDB(
      "select * from product as p 
          left outer join brand as b on p.BrandID = b.BrandID 
          left outer join category as c on p.CategoryID = c.CategoryID 
          left outer join productstock as ps on p.productID = ps.ProductID 
          WHERE p.ProductID = ? ", [$id]
    );
  }


  function getDetail($id) {
    return $this->selectDB("SELECT * FROM Product WHERE ProductID = ? ", [$id]
    )[0];
  }

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

  }

  function delete($id) {

  }

}
