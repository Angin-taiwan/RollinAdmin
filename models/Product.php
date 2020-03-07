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
  public $SizeID;
  public $ColorID;
  public $UnitsOnOrder;
  public $TotalonOreder;
  

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
function getAllLike($ProductName, $column = "p.ProductID", $sort = "ASC", $startIndex = 0, $pageSize = 20) {
  $sort = $sort == "DESC" ? "DESC" : "ASC"; 
  $column_white_list = ['p.ProductID','ProductName','Description'];
  // $column = in_array($column, $column_white_list) ? $column : $column_white_list[0];
  return $this->selectDB(
    "SELECT p.ProductID, p.ProductName, p.BrandID, p.CategoryID, p.PDescription, p.Discontinued, p.UnitPrice,
    p.Date, b.BrandName, c.CategoryName, ps.ProductID P_ID,SUM(ps.UnitInStock) TotalStock, SUM(od.Quantity) StockOnOrder 
    from product as p
       left outer join productstock as ps on p.ProductID = ps.ProductID   
       left outer join brand as b on p.BrandID = b.BrandID           
       left outer join category as c on p.CategoryID = c.CategoryID   
       left outer join orderdetail as od on od.ProductID = p.ProductID
          WHERE p.ProductName LIKE CONCAT('%',?,'%') 
          GROUP BY p.ProductID 
          ORDER BY $column $sort
          LIMIT ?, ? 
           ;",
    [$ProductName, $startIndex, $pageSize]
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
      "select ps.SizeID, ps.ColorID, ps.UnitInStock , s.SizeName, Color.Color from product as p 
      left outer join productstock as ps on p.productID = ps.ProductID 
      left outer join Size as s on ps.SizeID = s.SizeID
      left outer join Color on Color.ColorID =ps.ColorID
      WHERE p.ProductID = ? ", [$id]
    );
  }

// C______________________________________________________
  function createProduct($Product) {
    $ProductName = trim($Product->ProductName);
    $Product->Discontinued = ($Product->Discontinued == 1 ? 1 : 0); 
    return $this->insertDB(
      "INSERT INTO `product` (`ProductName`, `BrandID`, `CategoryID`, `PDescription`, `Discontinued`, 
      `UnitPrice`) VALUES (?,?,?,?,?,?) ;", 
      ["$Product->ProductName" , "$Product->BrandID" , $Product->CategoryID , $Product->PDescription , 
      "$Product->Discontinued" , "$Product->UnitPrice" ]
    );
  }

  function stocksFirst($Productstocks){
    return $this->insertDB(
      "INSERT INTO `productstock` (`ProductID`, `SizeID`, `ColorID`, `UnitInStock`, `UnitsOnOrder`) VALUES
      (?, ?, ?, ?, 0);", 
      [$Productstocks->ProductID , $Productstocks->SizeID , $Productstocks->ColorID , $Productstocks->UnitInStock]
    );
  }

// U______________________________________________________
  function updateProduct($Product) {
    return $this->updateDB(
      "UPDATE Product SET ProductName = ?,UnitPrice = ? , PDescription = ? WHERE ProductID = ? ;",
      ["$Product->ProductName", "$Product->UnitPrice", "$Product->PDescription", $Product->ProductID]
    );
  }

  function updateProductStocks($Stock) { 
    $newSizeID = $Stock->SizeID ;
    $newColorID = $Stock->ColorID ;
    $newStock = $Stock->UnitInStock ;
    return $this->updateDB(
      "UPDATE productstock SET SizeID = $newSizeID,ColorID = $newColorID , UnitInStock = $newStock 
        WHERE ProductID = ? AND SizeID = $newSizeID, ColorID = $newColorID ;",
      [$Stock->ProductID]
    );
  }

  function updateProductDiscontinued($Product) { #working
    return $this->updateDB(
      "UPDATE Product SET Discontinued = ?,UnitPrice = ? , PDescription = ? WHERE ProductID = ? ;",
      ["$Product->ProductName", "$Product->UnitPrice", "$Product->PDescription", $Product->ProductID]
    );
  }

  // Show name______________________________________________________
function findmyBrandName(){
  return $this->selectDB(
    "select BrandID, BrandName from Brand;"
  );
}

function findmyMainCategoryName(){
  return $this->selectDB(
  "SELECT * from Category WHERE ParentID IS NULL;");
}

function findmyCldCategoryName($id=null){
  if($id==null){
    return $this->selectDB(
      "SELECT * from Category WHERE ParentID IS NOT NULL;");
  } else{
    return $this->selectDB(
      "SELECT * from Category WHERE ParentID = $id;");
  }
}

function findmySizeName($id=null){
  return $this->selectDB(
    "SELECT s.SizeID, s.SizeName, cs.CategoryID, c.CategoryName from Size as s
    join categorysize as cs on cs.SizeID = s.SizeID
    join category as c on cs.CategoryID = c.CategoryID
    -- WHERE cs.CategoryID = $id
    ;"
  );
}

function findmyColorName(){
  return $this->selectDB(
    "SELECT ColorID, Color from Color;"
  );
}
function findmyTotalonOreder($id){
    return $this->selectDB(
      "SELECT p.ProductID, SUM(od.Quantity) StockOnOrder from product as p 
      left outer join orderdetail as od on od.ProductID = p.ProductID
      WHERE p.ProductID = $id GROUP BY od.ProductID 
      ;"
      )[0];
}
# D_____________________________________________________
function delete($ids = []){
if (empty($ids)) {return "error: ids is empty";}
return $this->deleteDB(
  "DELETE FROM Product WHERE ProductID IN (" . str_repeat("?,", count($ids) -1) . "?);",
  $ids);
}

function ONsale($ids = []){
  if (empty($ids)) {return "error: ids is empty";}
  return $this->deleteDB(
    "UPDATE Product SET Discontinued =0 WHERE ProductID IN (" . str_repeat("?,", count($ids) -1) . "?);",
    $ids);
  }
function OFFsale($ids = []){
  if (empty($ids)) {return "error: ids is empty";}
  return $this->deleteDB(
    "UPDATE Product SET Discontinued =1 WHERE ProductID IN (" . str_repeat("?,", count($ids) -1) . "?);",
    $ids);
  }

}