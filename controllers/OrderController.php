<?php

class OrderController extends Controller {

  function index() {
    $this->view("order/orderList");
  }

  function list() {
    $this->view("order/orderList");
  }

  function create() {
    $this->view("order/orderCreate");
  }

  function detail($id) {
    $order = $this->model("Order");
    $order->id = $id;
    $this->view("order/orderDetail", $order);
  }
}

?>