<?php

class BrandController extends Controller {

  function index() {
    $brand = $this->model("Brand");
    $this->view("Brand/brandList", $brand);
  }

  function list() {
    $brand = $this->model("Brand");
    $this->view("Brand/brandList", $brand);
  }

  function create() {
    $brand = $this->model("Brand");
    $this->view("Brand/brandCreate", $brand);
  }

  function update($id) {
    $brand = $this->model("Brand");
    $brand->id = $id;
    $this->view("Brand/brandUpdate", $brand);
  }

  function detail($id) {
    $brand = $this->model("Brand");
    $brand->id = $id;
    $this->view("Brand/brandDetail", $brand);
  }
}

?>