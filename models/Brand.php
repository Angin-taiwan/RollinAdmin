<?php

class Brand extends DB {
  function getAll(){
    return $this->select("SELECT * FROM Brand");
  }

  function get($id) {
    return $this->select("SELECT * FROM Brand WHERE BrandID = ? ", [$id])[0];
  }

  function create() {

  }

  function update($id) {

  }

  function delete($id) {

  }

}

?>
