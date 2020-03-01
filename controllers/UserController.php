<?php

class UserController extends Controller {

  function index() {
    $this->view("User/userList");
  }

  function list() {
    $user = $this->model("User");
    $this->view("User/userList", $user);
  }

  function create() {
    $user = $this->model("User");
    $this->view("User/userCreate" , $user);
  }

  function detail($id) {
    $user = $this->model("User");
    $user->id = $id;
    $this->view("User/userDetail", $user);
  }
}

?>