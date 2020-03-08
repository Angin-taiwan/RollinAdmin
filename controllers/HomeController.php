<?php

class HomeController extends Controller {
  function index() {
    $admin = $this->model("admin");
    $this->view("Home/home", $admin);
  }
  function Home() {
    $admin = $this->model("admin");
    $this->view("Home/home", $admin);
  }
}

?>