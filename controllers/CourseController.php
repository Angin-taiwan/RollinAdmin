<?php

class CourseController extends Controller {

  function index() {
    $this->view("course/courseList");
  }

  function list() {
    $this->view("course/courseList");
  }

  function create() {
    $this->view("course/courseCreate");
  }

  function detail($id) {
    $course = $this->model("Course");
    $course->id = $id;
    $this->view("course/courseDetail", $course);
  }
}

?>