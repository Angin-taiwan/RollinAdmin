<?php

class MarketingController extends Controller {

  function index() {
    $this->view("marketing/marketingList");
  }

  function list() {
    $this->view("marketing/marketingList");
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