<?php

$pageDir = "News";
$pageTitle = "News Create";

$news = new News();
if (isset($_POST["insertButton"])) {
  $news->Title = $_POST["Title"];
  $news->Description = $_POST["Description"];
  $data->create($news);
  echo "<script> alert('新增成功');location.href = '/RollinAdmin/News/List' </script>";
  // header("location: /RollinAdmin/News/List");
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">

  <form method="post" action="News/Create">

    <div class="form-group">
      <label for="Title" class="text">
        Title :
      </label>
      <input type="text" class="form-control" name="Title" id="Title"  required="required" style="width:70%">
    </div>
    <div class="form-group">
      <label for="Description" class="text">
        Description :
      </label>
      <textarea type="text" class="form-control" name="Description" id="Description" style="height:300px ;width:70%"  required="required"></textarea> 
    </div>

    <input name="action" type="hidden" value="id">
    <button type="submit" class="btn btn-info" name="insertButton" id="insertButton">新增資料</button>
    <button type="reset" class="btn btn-danger">清除資料</button>

  </form>
</div>
<!-- /.container-fluid -->