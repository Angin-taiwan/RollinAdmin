<?php

class NewsController extends Controller {

  function index() {
    $this->view("news/newsList");
  }

  function list() {
    $news = $this->model("News");
    $this->view("news/newsList", $news);
  }

  function create() {
    $news = $this->model("News");
    $this->view("news/newsCreate", $news);
  }

  function detail($id) {
    $news = $this->model("News");
    $news->id = $id;
    $this->view("news/newsDetail", $news);
  }

  function update($id) {
    $news = $this->model("News");
    $news->id = $id;
    $this->view("news/newsUpdate", $news);
  }

  
  function delete($id) {
    $news = $this->model("News");
    $news->id = $id;
    $this->view("news/newsList", $news);
  }
}

?>