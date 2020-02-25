<?php

class UserController extends Controller {

  function index() {
    $this->view("user/userList");
  }

  function list() {
    $this->view("user/userList");
  }

  function create() {
    $this->view("user/userCreate");
  }

  function detail($id) {
    $user = $this->model("User");
    $user->id = $id;
    $this->view("user/userDetail", $user);
  }
}

?>