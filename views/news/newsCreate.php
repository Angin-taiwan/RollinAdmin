<?php

$pageDir = "News";
$pageTitle = "News Create";

$pageDirTW = "消息管理";
$pageTitleTW = "消息新增";

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
  <div class="row">
    <div class="col-8">
  <form method="post" action="News/Create">
  
    <div class="form-group">
      <label for="Title" class="text">
        Title :
      </label>
      <input type="text" class="form-control" name="Title" id="Title"  required="required" placeholder="輸入新消息標題" style="width:70%">
    </div>
    <div class="form-group">
      <label for="Description" class="text">
        Description :
      </label>
      <textarea type="text" class="form-control" name="Description" id="Description" placeholder="輸入消息內容" style="height:300px ;width:70%"  required="required"></textarea> 
      
      <input name="action" type="hidden" value="id">
      <button type="submit" class="btn btn-info" name="insertButton" id="insertButton">新增資料</button>
      <button type="reset" class="btn btn-danger" onclick="return confirm('確認清除新增內容資料嗎 ??')">清除資料</button>
    </div>
    </div>
    
    <div class="col-4">
      
        <div class="form-group">
          <label for="file-upload">上傳圖片</label>
          <div class="card" style="height:380px">
        <input type="file" name="myfile">
      </div>
        </div>
      
    </div>
  </div>
  </form>
</div>
<!-- /.container-fluid -->