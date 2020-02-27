<?php

class UserController extends Controller {

  function index() {
    $this->view("user/userList");
  }

  function list() {
    $user = $this->model("User");
    $this->view("user/userList", $user);
  }

  function create() {
    $user = $this->model("User");
    $this->view("user/userCreate" , $user);
  }

  function detail($id) {
    $user = $this->model("User");
    $user->id = $id;
    $this->view("user/userDetail", $user);
  }
}

?>