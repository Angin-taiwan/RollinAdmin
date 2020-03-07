<?php

class MarketingController extends Controller {

  function index() {
    $marketing = $this->model("Marketing");
    $this->view("marketing/marketingList", $marketing);
  }

  function list() {
    $marketing = $this->model("Marketing");
    $this->view("marketing/marketingList", $marketing);
  }

  function create() {
    $this->view("marketing/marketingCreate");
  }

  function detail($id) {
    $marketing = $this->model("Marketing");
    $marketing->id = $id;
    $this->view("marketing/marketingDetail", $marketing);
  }
}

?>