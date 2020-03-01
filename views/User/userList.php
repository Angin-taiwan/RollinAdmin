<?php

$pageDir = "User";
$pageTitle = "User List";

$users = $data->getAll();

require_once 'views/template/header.php';

?>

<style>
*{
  font-family: 微軟正黑體;
  font-size: 16px;
}
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Users</h3>
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
              <th>註冊日期</th>
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
              echo "<td>".$user->CreateDate."</td>";
              echo "<td><a href='/RollinAdmin/User/Detail/$user->UserID'>詳細資料</a></td>";
              echo "<td><a href='userUpdate.php?id=$user->UserID'> 修改</a>";
              echo "<a href='userDelete.php?id=$user->UserID'> 刪除</a></td>";
              echo "</tr>";
            }
          ?>
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>











  <?php //測試
    // $users = $data->getAll();
    // foreach ($users as $user) {
    //   echo $user->UserName, "<br>";
    // }
  ?>


<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>