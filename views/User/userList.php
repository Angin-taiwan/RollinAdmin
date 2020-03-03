<?php

$pageDir = "User";
$pageTitle = "User List";

$pageDirTW = "會員管理";
$pageTitleTW = "會員清單";

$user = $data->getAll();

require_once 'views/template/header.php';

?>



<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <span>顯示方式：</span>
      <span class="float-right">總共<?=$num_rows?>筆資料</span>
    </div>
    <div class="card-body">
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
              <th>Email</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          <?php
            foreach ($user as $user){
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