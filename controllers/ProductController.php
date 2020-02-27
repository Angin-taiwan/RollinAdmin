<?php

class ProductController extends Controller {

  function index() {
    $this->view("product/productList");
  }

  function list() {
    $product = $this->model("Product");
    $this->view("product/productList", $product);
  }

  function create() {
    $this->view("product/productCreate");
  }

  function detail($id) {
    $product = $this->model("Product");
    $product->id = $id;
    $this->view("product/productDetail", $product);
  }
}

?>