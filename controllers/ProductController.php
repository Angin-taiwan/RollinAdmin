<?php

class ProductController extends Controller {

  function index() {
    $this->view("product/productList");
  }

  function list() {
    $this->view("product/productList");
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