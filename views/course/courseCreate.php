<?php

$pageDir = "Course";
$pageTitle = "Course Create";
// 中文化
$pageDirTW = "課程管理";
$pageTitleTW = "課程新增";
$Course = new Course();
$PriceError = "";
$DateError = "";

$TitleValue = "";
$DescriptionValue = "";
$StartDateValue = "";
$EndDateValue = "";
$PriceValue = "";

if (isset($_POST["insertButton"])) {
  if (is_numeric($_POST["Price"])) {
    if (intval(($_POST["Price"])) <= 0 && ($_POST["StartDate"] >= $_POST["EndDate"])) {
      $TitleValue = $_POST["Title"];
      $DescriptionValue = $_POST["Description"];
      $DateError = "❌開課日期 必須早於 結訓日期";
      $PriceError = "❌金額必須 > 0";
    } else {
      if ($_POST["StartDate"] >= $_POST["EndDate"]) {
        $DateError = "❌開課日期 必須早於 結訓日期";
        $TitleValue = $_POST["Title"];
        $PriceValue = ((int) $_POST["Price"]);
        $DescriptionValue = $_POST["Description"];
      } else {
        if (intval(($_POST["Price"])) <= 0) {
          $PriceError = "❌金額必須 > 0";
          $TitleValue = $_POST["Title"];
          $DescriptionValue = $_POST["Description"];
          $StartDateValue = $_POST["StartDate"];
          $EndDateValue = $_POST["EndDate"];
        } else {
          $Course->Title = $_POST["Title"];
          $Course->Description = $_POST["Description"];
          $Course->StartDate = $_POST["StartDate"];
          $Course->EndDate = $_POST["EndDate"];
          $Course->Price = (int) ($_POST["Price"]);
          $data->create($Course);
          echo "<script> alert('新增成功');location.href = '/RollinAdmin/course/List' </script>";
        }
      }
    }
  }
}

require_once 'views/template/header.php';

?>

<style>
  .error {
    color: red;
  }
</style>

<div class="container-fluid">
  <div style="width:70%">
    <form method="post" action="Course/Create">

      <div class="form-group">
        <label for="Title" class="text">
          課程名稱 :
        </label>
        <input type="text" class="form-control" name="Title" id="Title" placeholder="輸入課程名稱" required="required" value="<?php echo $TitleValue ?>">
      </div>

      <div class="form-group">
        <label for="price" class="number">
          課程金額 :
        </label>
        <input type="number" class="form-control" name="Price" id="Price" placeholder="輸入課程費用" required="required" value="<?php ?>">
        <span class="error"><?php echo $PriceError ?></span>
      </div>

      <div class="row">
        <div class="form-group col-6">
          <label for="StartDate" class="date">
            開課時間 :
          </label>
          <input type="datetime-local" class="form-control" name="StartDate" id="StartDate" required="required" style="width:100%" value="<?php echo $StartDateValue ?>">
          <span class="error"><?php echo $DateError ?></span>
        </div>

        <div class="form-group col-6">
          <label for="EndDate" class="date">
            結訓時間 :
          </label>
          <input type="datetime-local" class="form-control" name="EndDate" id="EndDate" required="required" style="width:100%" value="<?php echo $EndDateValue ?>">
        </div>
      </div>

      <div class="row">
      </div>
      <div class="form-group">
        <label for="Description" class="text">
          課程內容 :
        </label>
        <textarea type="text" class="form-control" name="Description" id="Description" placeholder="輸入課程內容" style="height:300px" required="required"><?php echo $DescriptionValue ?></textarea>
      </div>

  </div>
  <input name="action" type="hidden" value="id">
  <button type="submit" class="btn btn-primary" name="insertButton" id="insertButton">新增資料</button>
  <button type="reset" class="btn btn-danger" onclick="return confirm('確認清除新增內容資料嗎 ??')">清除資料</button>

  </form>
</div>
&nbsp;
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>