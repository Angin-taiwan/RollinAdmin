<?php

class NewsController extends Controller {

  function index() {
    $this->view("news/newsList");
  }

  function list() {
    $this->view("news/newsList");
  }

  function create() {
    $this->view("news/newsCreate");
  }

  function detail($id) {
    $news = $this->model("News");
    $news->id = $id;
    $this->view("news/newsDetail", $news);
  }
}

?>