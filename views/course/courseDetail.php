<?php

$pageDir = "Course";
$pageTitle = "Course Detail";

$pageDirTW = "課程管理";
$pageTitleTW = "課程詳細資訊";

$GetCourse = $data->getCourseByID($data->id);

require_once 'views/template/header.php';
$Course = new Course();
?>
<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>欄位</th>
              <th>資料</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <td>NewsID</td>
              <td><?= $GetCourse->CourseID?></td>            
            </tr>

            <tr>
              <td>Title</td>
              <td><?= $GetCourse->Title?></td>            
            </tr>

            <tr>
              <td>Price</td>
              <td>$<?= $GetCourse->Price?></td>            
            </tr>

            <tr>
              <td>StartDate</td>
              <td><?= $GetCourse->StartDate?></td>            
            </tr>

            <tr>
              <td>EndDate</td>
              <td><?= $GetCourse->EndDate?></td>            
            </tr>

            <tr>
              <td>CreateDate</td>
              <td><?= $GetCourse->CreateDate?></td>            
            </tr>

            <tr>
              <td>UpdateDate</td>
              <td><?= $GetCourse->UpdateDate?></td>            
            </tr>

            <tr>
              <td>Description</td>
              <td><?= $GetCourse->Description?></td>            
            </tr>     

          </tbody>
        </table>
      
      </div>
    </div>  
    <a href="/RollinAdmin/Course/Update/<?= $GetCourse->CourseID?>"><button type="button" class="btn btn-info">修改資料</button></a> 
    <a href="/RollinAdmin/Course/List"><button type="button" class="btn btn-primary">返回清單</button></a> 
  </div>
  &nbsp;
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>