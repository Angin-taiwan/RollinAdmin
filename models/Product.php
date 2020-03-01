<?php

class Product extends DB {

  // $BrandID_Name = [];

  function getAll(){
    return $this->selectDB(
      "select * from product as p 
          left outer join brand as b on p.BrandID = b.BrandID 
          left outer join category as c on p.CategoryID = c.CategoryID ;"
    );
  }

  function get($id) {
    return $this->selectDB("SELECT * FROM Product WHERE ProductID = ? ", [$id])[0];
  }

  function getBrand(){
    return $this->selectDB("SELECT * FROM Brand ;"); 
  }

  function create() {

  }

  function update($id) {

  }

  function delete($id) {

  }

}
