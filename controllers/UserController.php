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

  function update($id) {
    $user = $this->model("User");
    $user->id = $id;
    $this->view("User/userUpdate" , $user);
  }

  function detail($id) {
    $user = $this->model("User");
    $user->id = $id;
    $this->view("User/userDetail", $user);
  }

  function delete($id){
    $user = $this->model("User");
    $user->id = $id;
    $this->view("User/userDelete", $user);
  }

}

?>