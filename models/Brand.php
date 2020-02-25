<?php

class Brand extends DB {
  function getAll(){
    return $this->select("SELECT * FROM Brand");
  }

  function getByName($name) {
    return $this->select("SELECT * FROM Brand WHERE FirstName = ? ", [$name]);
  }
}

?>
