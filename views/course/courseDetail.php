<?php

$pageDir = "Course";
$pageTitle = "Course Detail";

$pageDirTW = "課程管理";
$pageTitleTW = "課程詳細資訊";

$GetCourse = $data->getCourseByID($data->id);
$People = get_object_vars($data->getAllStudentCount($data->id))["Total"];
$full = "";
if ($People == 20) {
  $full = "🈵";
}
$CourseStart = "";
if ($GetCourse->StartDate <= date("Y-m-d")) {
  $CourseStart = "(已開課)";
  if ($GetCourse->EndDate < date("Y-m-d")) {
    $CourseStart = "(已結訓)";
  }
}

$free = "";
if ($GetCourse->Price == 0) {
  $free = "(免費)";
}

require_once 'views/template/header.php';
$Course = new Course();
?>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
    table-layout: fixed;
  }

  th,
  td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
    font-size: 15px;

  }

  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th width="200px">欄位</th>
              <th>資料</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>課程ID</td>
              <td><?= $GetCourse->CourseID ?></td>
            </tr>

            <tr>
              <td>課程名稱</td>
              <td><?= $GetCourse->Title . $full . $CourseStart ?></td>
            </tr>

            <tr>
              <td>課程金額</td>
              <td>$<?= $GetCourse->Price  . $free?></td>
            </tr>

            <tr>
              <td>開課時間</td>
              <td><?= $GetCourse->StartDate ?></td>
            </tr>

            <tr>
              <td>結訓時間</td>
              <td><?= $GetCourse->EndDate ?></td>
            </tr>

            <tr>
              <td>創建時間</td>
              <td><?= $GetCourse->CreateDate ?></td>
            </tr>

            <tr>
              <td>更新時間</td>
              <td><?= $GetCourse->UpdateDate ?></td>
            </tr>

            <tr>
              <td>課程內容</td>
              <td><?= $GetCourse->Description ?></td>
            </tr>

          </tbody>
        </table>
        <div class="mt-3">
          <a href="/RollinAdmin/Course/Update/<?= $GetCourse->CourseID ?>"><button type="button" class="btn btn-info">修改資料</button></a>
          <a href="/RollinAdmin/Course/List"><button type="button" class="btn btn-primary">返回清單</button></a>
          <a href="/RollinAdmin/Course/Student/<?= $GetCourse->CourseID ?>"><button type="button" class="btn btn-primary float-right">報名會員</button></a>
        </div>

      </div>
    </div>
  </div>
  &nbsp;
  <!-- /.container-fluid -->

  <?php

  require_once 'views/template/footer.php';

  ?>