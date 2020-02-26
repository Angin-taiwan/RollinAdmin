<?php

class BrandController extends Controller {

  function index() {
    $this->view("Brand/brandList");
  }

  function list() {
    $brand = $this->model("Brand");
    $this->view("Brand/brandList", $brand);
  }

  function create() {
    $this->view("Brand/brandCreate");
  }

  function detail($id) {
    $brand = $this->model("Brand");
    $brand->id = $id;
    $this->view("Brand/brandDetail", $brand);
  }
}

?>