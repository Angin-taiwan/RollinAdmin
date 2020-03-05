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
    $product = $this->model("Product");
    $this->view("product/productCreate", $product);
  }

  function update($id) {
    $product = $this->model("Product");
    $product->id = $id;
    $this->view("Product/ProductUpdate", $product);
  }

  function detail($id) {
    $product = $this->model("Product");
    $product->id = $id;
    $this->view("product/productDetail", $product);
  }
}

?>