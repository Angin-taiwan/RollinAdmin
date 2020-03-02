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
      "select * from product as p 
          left outer join brand as b on p.BrandID = b.BrandID               -- 品牌
          left outer join category as c on p.CategoryID = c.CategoryID      -- 類別
          left outer join productstock as ps on p.productID = ps.productID  -- 庫存
          ;"
    );
  }
  function getStock($id){
    return $this->selectDB(
      "select * from product as p 
          left outer join brand as b on p.BrandID = b.BrandID 
          left outer join category as c on p.CategoryID = c.CategoryID 
          left outer join productstock as ps on p.productID = ps.productID 
          WHERE p.ProductID = ? ", [$id]
    );
  }


  function get($id) {
    return $this->selectDB("SELECT * FROM Product WHERE ProductID = ? ", [$id]
    )[0];
  }

  function createProduct($Product) {
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
