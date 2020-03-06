<?php

$pageDir = "Course";
$pageTitle = "Course Create";
// 中文化
$pageDirTW = "課程管理";
$pageTitleTW = "課程新增";
$Course = new Course();

if (isset($_POST["insertButton"])) {
  $Course->Title = $_POST["Title"];
  $Course->Description = $_POST["Description"];
  $Course->StartDate = $_POST["StartDate"];
  $Course->EndDate = $_POST["EndDate"];
  $Course->Price = (int) ($_POST["Price"]);
  $data->create($Course);
  echo "<script> alert('新增成功');location.href = '/RollinAdmin/course/List' </script>";
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div style="width:70%">
    <form method="post" action="Course/Create">

      <div class="form-group">
        <label for="Title" class="text">
          Title :
        </label>
        <input type="text" class="form-control" name="Title" id="Title" placeholder="輸入課程名稱" required="required">
      </div>

      <div class="form-group">
        <label for="price" class="number">
          Price :
        </label>
        <input type="number" class="form-control" name="Price" id="Price" placeholder="輸入課程費用" required="required">
      </div>

      <div class="row">
        <div class="form-group col-6">
          <label for="StartDate" class="date">
            StartDate :
          </label>
          <input type="datetime-local" class="form-control" name="StartDate" id="StartDate" required="required" style="width:100%">
        </div>

        <div class="form-group col-6">
          <label for="EndDate" class="date">
            EndDate :
          </label>
          <input type="datetime-local" class="form-control" name="EndDate" id="EndDate" required="required" style="width:100%">
        </div>
      </div>

      <div class="row">
      </div>
      <div class="form-group">
        <label for="Description" class="text">
          Description :
        </label>
        <textarea type="text" class="form-control" name="Description" id="Description" placeholder="輸入課程內容" style="height:300px" required="required"></textarea>
      </div>

  </div>
  <input name="action" type="hidden" value="id">
  <button type="submit" class="btn btn-info" name="insertButton" id="insertButton">新增資料</button>
  <button type="reset" class="btn btn-danger" onclick="return confirm('確認清除新增內容資料嗎 ??')">清除資料</button>

  </form>
</div>
&nbsp;
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>