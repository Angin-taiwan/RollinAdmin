<?php

$pageDir = "User";
$pageTitle = "User Detail";

$pageDirTW = "會員管理";
$pageTitleTW = "會員詳細資料";

$user = $data->getUserById($data->id); 
$course = $data->getCourseStudentById($data->id);
$coupon = $data->getCouponById($data->id);

$courseTitle = empty($course->Title) ? "無" : $course->Title ;
$couponName = empty($coupon->CouponName) ? "無" : $coupon->CouponName ;
 

//性別轉中文
$chGender = $user->Gender;
switch($chGender){
  case "F":  
    $chGender = "女";
    break;
  case "M":
    $chGender = "男";
    break;
  case "U":
    $chGender = "其他";
    break;
}

require_once 'views/template/header.php';

?>

<style>
  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>


<div class="container-fluid">
  <div class="col-md-8 mx-auto">
    <div class="card p-3">
      <div class="card-body">
        <table class="table table-bordered table-hover ">
          <thead>
            <tr>
              <th>欄位</th>
              <th>資料</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>會員ID</td>
              <td><?= $user->UserID?></td>            
            </tr>
            <tr>
              <td>姓名</td>
              <td><?= $user->UserName?></td>            
            </tr>
            <tr>
              <td>暱稱</td>
              <td><?= $user->NickName?></td>            
            </tr>
            <tr>
              <td>性別</td>
              <td><?= $chGender?></td>            
            </tr>
            <tr>
              <td>生日</td>
              <td><?= $user->Birthdate?></td>            
            </tr>
            <tr>
              <td>電話</td>
              <td><?= $user->Phone?></td>            
            </tr>
            <tr>
              <td>信箱</td>
              <td><?= $user->Email?></td>            
            </tr>
            <tr>
              <td>國家</td>
              <td><?= $user->Country?></td>            
            </tr>
            <tr>
              <td>地址</td>
              <td><?= $user->City?><?= $user->District?><?= $user->Address?></td>            
            </tr>
            <tr>
              <td>註冊時間</td>
              <td><?= $user->CreateDate?></td>            
            </tr>           
            <tr>
              <td>折價券</td>
              <td><a href="/RollinAdmin/Coupon/Detail/<?=$coupon->CouponID?>"><?=$couponName?></a></td>
            </tr>
            <tr>
              <td>課程</td>
              <td><a href="/RollinAdmin/Course/Detail/<?=$course->CourseID?>"><?=$courseTitle?></a></td>
            </tr>
            
          </tbody>
        </table>
        
        <span class="float-right mt-4">
          <?="<a class='btn btn-secondary' href=/RollinAdmin/User/Update/$user->UserID>修改</a>"?>
          <a class="btn btn-info" href="/RollinAdmin/User/List/">返回表單</a>
        </span>
      </div>
    </div>  
  </div>

</div>
  







<?php

require_once 'views/template/footer.php';

?>