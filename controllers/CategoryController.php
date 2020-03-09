<?php

class CategoryController extends Controller {

  function index() {
    $category = $this->model("Category");
    $this->view("category/categoryList", $category);
  }

  function list() {
    $category = $this->model("Category");
    $this->view("category/categoryList", $category);
  }

  function create() {
    $this->view("category/categoryCreate");
  }

  function detail($id) {
    $category = $this->model("Category");
    $category->id = $id;
    $this->view("category/categoryDetail", $category);
  }

}

?>