<?php

$pageDir = "User";
$pageTitle = "User List";

$pageDirTW = "會員管理";
$pageTitleTW = "會員清單";


//分頁 下一頁
parse_str($_SERVER['QUERY_STRING'],$query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 2;
var_dump($pageSize);


//顯示資料筆數、分頁
$sumRow = get_object_vars($data->getAllCount())["Total"];
$pageTotal = intval($sumRow/$pageSize)+1; 
$startIndex = ($pageNo - 1) * $pageSize ;
$users = $data->getAll($startIndex,$pageSize);
//var_dump($pageTotal);





//搜尋
if(isset($_POST["submit"])){
  $search = $_POST["search"];
  $column = $_POST["column"];
  $startIndex = "0";
  $_GET["pageSize"] == "" ? $pageSize ="8" : $pageSize = $_GET["pageSize"];
  $users = $data->getAllLike($column,$search,$startIndex,$pageSize);
  $sumRow = get_object_vars($data->getAllLikeCount($column,$search))["Total"];
};

//全部會員一覽
if(isset($_POST["showAll"])){
  $pageSize = 20 ;
  $users = $data->getAll($startIndex,$pageSize);
  $sumRow = get_object_vars($data->getAllCount())["Total"];
}





// $startIndex
// $pageSize


require_once 'views/template/header.php';

?>


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <form method="post">
        <button type="submit" name="showAll" class="btn btn-outline-primary btn-sm float-right mr-1">全部會員一覽</button>
      </form>
      <br>
      <!-- 搜尋 -->
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
    </div>
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <form method="get" name="form" class="form-inline mr-auto">
          <span>每頁顯示資料筆數：</span>
          <select name="pageSize" onchange="submit()" class="form-control form-control-sm">
            <option value="3" <?= ($pageSize == "3") ? "selected=selected":""; ?>>3</option>
            <option value="8" <?= ($pageSize == "8") ? "selected=selected":""; ?>>8</option>
            <option value="20" <?= ($pageSize == "20") ? "selected=selecter":""; ?>>20</option>
          </select>
        </form>
        <div class="font-weight-bolder ml-auto">總共 <?=$sumRow?> 筆資料 </div>
      </div>
      <div>
      <form method="get">
        <button type="submit" name="prePage" class="btn btn-light text-dark">上一頁</button>
        <span>第<?= $pageNo?>頁</span>
        <button type="submit" name="nextPage" class="btn btn-light text-dark">下一頁</button>
        <span>總共<?= $pageTotal?>頁</span>
      </form>
      </div>

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