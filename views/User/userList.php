<?php

$pageDir = "User";
$pageTitle = "User List";

$pageDirTW = "會員管理";
$pageTitleTW = "會員清單";

$users = $data->getAll();
$sumRow = $data->getAllCount();


if(isset($_POST["submit"])){
  $search = $_POST["search"];
  $column = $_POST["column"];
  $users = $data->getAllLike("$column","$search");
  $sumRow = $data->getAllLikeCount("$column","$search");
};

if(isset($_POST["showAll"])){
  $users = $data->getAll();
  $sumRow = $data->getAllCount();
}


require_once 'views/template/header.php';

?>


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <form method="post">
        <button type="submit" name="showAll" class="btn btn-outline-primary btn-sm float-right mr-1">全部會員一覽</button>
      </form>
      <form method="post" class="form-inline mx-auto mt-2 ml-2 align-items-center">
        <label>搜尋：</label>
        <select name="column" class="form-control form-control-sm ml-1">
          <option value="UserName">姓名</option>
          <option value="Email">信箱</option>
          <option value="Phone">電話</option>
        </select>
        <input type="text" name="search" class="form-control form-control-sm col-sm-3 ml-2" >
        <button type="submit" name="submit" class="btn btn-sm btn-info ml-2">送出</button>
      </form>
      <br>

      <!-- <span class="float-right">每頁顯示?筆資料，共?頁</span> -->
    </div>
    <div class="card-body">
      <div class="text-right mr-2 mb-3 font-weight-bolder">總共 <?=$sumRow->Total?> 筆資料 </div>
      <table class="table table-bordered table-hover">
        <thead class="table-info">
          <tr>
              <th></th>
              <th>會員ID</th>
              <th>姓名</th>
              <th>暱稱</th>
              <th>性別</th>
              <th>生日</th>
              <th>電話</th>
              <th>信箱</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($users as $user){
              echo "<tr>";
              echo '<td><input type="checkbox"></td>';
              echo "<td>".$user->UserID."</td>";
              echo "<td>".$user->UserName."</td>";
              echo "<td>".$user->NickName."</td>";
              echo "<td>".$user->Gender."</td>";
              echo "<td>".$user->Birthdate."</td>";
              echo "<td>".$user->Phone."</td>";
              echo "<td>".$user->Email."</td>";
              echo "<td>
                      <a href='/RollinAdmin/User/Detail/$user->UserID' class='btn btn-sm btn-outline-info'>詳細資料</a>
                    </td>";
              echo "<td>
                      <a href='/RollinAdmin/User/Update/$user->UserID' class='btn btn-sm btn-secondary mr-2'> 修改</a>";
              echo   "<a href='/RollinAdmin/User/Delete/$user->UserID' class='btn btn-sm btn-warning'> 刪除</a>
                    </td>";
              echo "</tr>";
            }
          ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>


  <?php 
  ?>


<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>