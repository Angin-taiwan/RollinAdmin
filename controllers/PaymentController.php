<?php

class PaymentController extends Controller {

  function index() {
    $this->view("Payment/PaymentList");
  }

  function list() {
    $Payment = $this->model("Payment");
    $this->view("Payment/PaymentList", $Payment);
  }

  function create() {
    $Payment = $this->model("Payment");
    $this->view("Payment/PaymentCreate", $Payment);
  }

  function update($id) {
    $Payment = $this->model("Payment");
    $Payment->id = $id;
    $this->view("Payment/PaymentUpdate", $Payment);
  }

  function detail($id) {
    $Payment = $this->model("Payment");
    $Payment->id = $id;
    $this->view("Payment/PaymentDetail", $Payment);
  }
}

?>