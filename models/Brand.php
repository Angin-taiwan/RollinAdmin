<?php

class Brand extends DB {
  function getAll(){
    return $this->select("SELECT * FROM Brand");
  }

  function getBrandByID($id) {
    return $this->select("SELECT * FROM Brand WHERE ID = ? ", [$id]);
  }

  function insertBrand() {

  }

  function updateBrand() {
    
  }

  function deleteBrand() {
    
  }

}

?>
