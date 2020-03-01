<?php

class OrderController extends Controller {

  function index() {
    $order = $this->model("Order");
    $this->view("order/orderList");
  }

  function list() {
    $order = $this->model("Order");
    $this->view("Order/orderList", $order);
  }

  function create() {
    $order = $this->model("Order");
    $this->view("Order/orderCreat", $order);
  }

  function detail($id) {
    $order = $this->model("Order");
    $order->id = $id;
    $this->view("Order/orderDetail", $order);
  }
}

?>