<?php

$pageDir = "News";
$pageTitle = "News Create";



require_once 'views/template/header.php';

if (isset($_POST["insertButton"])) {
  $news = new News();
  $news->Title = $_POST["Title"];
  $news->Description = $_POST["Description"];
  $news->CreateDate = $_POST["CreateDate"];
  $news->UpdateDate = $_POST["UpdateDate"];
  // $commandText = 
  //     "insert into News "
  //   . "set Title = '{$Title}' "
  //   . "  , Description       = '{$Description}'"
  //   . "  , CreateDate    = '{$CreateDate}'"
  //   . "  , UpdateDate    = '{$UpdateDate}'";
  $data->create($news);
}

?>

<div class="container-fluid">

  <form method="post" action="News/Create">

    <div class="form-group">
      <label for="Title" class="text">
        Title :
      </label>
      <input type="text" class="form-control" name="Title" id="Title">
    </div>

    <div class="form-group">
      <label for="Description" class="text">
        Description :
      </label>
      <input type="text" class="form-control" name="Description" id="Description" style="height:200px">
    </div>

    <div class="form-group">
      <label for="CreateDate" class="date">
        CreateDate :
      </label>
      <input type="date" class="form-control" name="CreateDate" id="CreateDate">
    </div>

    <div class="form-group">
      <label for="UpdateDate" class="date">
        UpdateDate :
      </label>
      <input type="date" class="form-control" name="UpdateDate" id="UpdateDate">
    </div>
    <input name="action" type="hidden" value="id">
    <button type="submit" class="btn btn-success" name="insertButton" id="insertButton">確認送出</button>
    <button type="reset" class="btn btn-danger">清除資料</button>

  </form>
</div>
<!-- /.container-fluid -->