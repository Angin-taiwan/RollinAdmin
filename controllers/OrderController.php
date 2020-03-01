<?php

class OrderController extends Controller {

  function index() {
    $this->view("Order/OrderList");
  }

  function list() {
    $Order = $this->model("Order");
    $this->view("Order/OrderList", $Order);
  }

  function create() {
    $Order = $this->model("Order");
    $this->view("Order/OrderCreate", $Order);
  }

  function update($id) {
    $Order = $this->model("Order");
    $Order->id = $id;
    $this->view("Order/OrderUpdate", $Order);
  }

  function detail($id) {
    $Order = $this->model("Order");
    $Order->id = $id;
    $this->view("Order/OrderDetail", $Order);
  }
}

?>