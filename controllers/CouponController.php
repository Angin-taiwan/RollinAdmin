<?php

class CouponController extends Controller {
  
  function index() {
    $this->view("coupon/couponList");
  }

  function list() {
    $coupon = $this->model("Coupon");
    $this->view("coupon/couponList", $coupon);
  }

  function create() {
    $this->view("coupon/couponCreate");
  }

  function detail($id) {
    $coupon = $this->model("Coupon");
    $coupon->id = $id;
    $this->view("coupon/couponDetail", $coupon);
  }
}

?>