<?php

class CourseController extends Controller {

  function index() {
    $this->view("Course/CourseList");
  }

  function list() {
    $Course = $this->model("Course");
    $this->view("Course/CourseList", $Course);
  }

  function create() {
    $Course = $this->model("Course");
    $this->view("Course/CourseCreate", $Course);
  }

  function detail($id) {
    $Course = $this->model("Course");
    $Course->id = $id;
    $this->view("Course/CourseDetail", $Course);
  }

  function update($id) {
    $Course = $this->model("Course");
    $Course->id = $id;
    $this->view("Course/CourseUpdate", $Course);
  }

  
  function delete($id) {
    $Course = $this->model("Course");
    $Course->id = $id;
    $this->view("Course/CourseList", $Course);
  }
  
  function student($id) {
    $Course = $this->model("Course");
    $Course->id = $id;
    $this->view("Course/CourseStudent", $Course);
  }

}

?>