<?php

$pageDir = "User";
$pageTitle = "User List";

$pageDirTW = "會員管理";
$pageTitleTW = "會員清單";


//get set querystring
parse_str($_SERVER['QUERY_STRING'],$query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$column = isset($query["column"]) ? $query["column"] : "";
$search = isset($query["search"]) ? $query["search"] : "";

//搜尋
$userTotal= get_object_vars($data->getAllCount())["Total"];
$startIndex = ($pageNo - 1) * $pageSize ;
$users = $search == "" ? $data->getAll($startIndex,$pageSize) : $data->getAllLike($column,$search,$startIndex,$pageSize);
$userCount = $search == "" ? $userTotal : get_object_vars($data->getAllLikeCount($column,$search))["Count"];
$pageTotal = ceil( (int)$userCount / (int)$pageSize); 


//全部會員一覽
if(isset($_POST["showAll"])){
  $search = "";
  $column = "";
  $pageSize = 20 ;
  $users = $data->getAll($startIndex,$pageSize);
  $userCount = get_object_vars($data->getAllCount())["Total"];
}

//多筆刪除(checkbox)
if(isset($_POST["deleteSubmit"])){
  $deleteArr = array();
  if(!empty($_POST["checkBox"])){
    foreach($_POST["checkBox"] as $checked){
      array_push($deleteArr,$checked);
    }
  }
  $data->deleteUser($deleteArr);
  header("Location: ./List");
  exit();
};



require_once 'views/template/header.php';

?>

<style>
  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <div class="float-right d-flex align-items-center">
        <span class="d-inline mr-2 text-primary">｜目前會員總數：<?=$userTotal?>名｜</span>
        <form method="post" class="d-inline">
          <button type="submit" name="showAll" class="btn btn-outline-primary btn-sm">全部會員一覽</button>
        </form>
      </div>
      <br>
      <br>
      <!-- 搜尋 -->
      <form method="get" class="form-inline mx-auto mt-2 ml-2 align-items-center">
        <label>搜尋：</label>
        <select name="column" class="form-control form-control-sm ml-1">
          <option value="UserName" <?= ($column =="UserName") ? "selected=selected":""; ?>>姓名</option>
          <option value="Email" <?= ($column =="Email") ? "selected=selected":""; ?>>信箱</option>
          <option value="Phone"<?= ($column =="Phone") ? "selected=selected":""; ?>>電話</option>
        </select>
        <input type="text" name="search" class="form-control form-control-sm col-sm-3 ml-2" 
                value="<?=$search?>" placeholder="請輸入查詢關鍵字">
        <button type="submit" class="btn btn-sm btn-info ml-2">送出</button>
        
        <?php
          $ch_cloumn = "";
          switch($column){
            case "UserName" : 
              $ch_cloumn = "姓名";
              break;
            case "Email" :
              $ch_cloumn = "信箱";
              break;
            case "Phone" :
              $ch_cloumn = "電話";
              break;
          };

          $display_none = "";
          if(empty($_GET["search"]) | isset($_POST["showAll"])){
            $display_none = "d-none";
          };
    
          echo "<div class='ml-4 text-info $display_none'> &nbsp&nbsp搜尋結果：
            「 $ch_cloumn 」>>「 $search 」，共有 $userCount 筆資料&nbsp&nbsp </div>";
        ?>
      <!-- </form> -->
      <br>
    </div>
    <div class="card-body">
      <div class="d-flex align-items-center mb-2">
        <!-- <form method="get" name="form" class="form-inline mr-auto"> -->
          <span>每頁顯示資料筆數：</span>
          <select name="pageSize" onchange="this.form.submit()" class="form-control form-control-sm col-sm-1">
            <option value="3" <?= ($pageSize == "3") ? "selected=selected":""; ?>>3</option>
            <option value="8" <?= ($pageSize == "8") ? "selected=selected":""; ?>>8</option>
            <option value="20" <?= ($pageSize == "20") ? "selected=selecter":""; ?>>20</option>
          </select>
        </form>
        <?php 
          echo "<div class='ml-auto font-weight-bolder'> 總共 $userCount 筆資料，共 $pageTotal 頁 </div>";
        ?>
        
      </div>
  

      <?php
        if($pageTotal>1){
          $queries = array(
            'pageSize' => $pageSize,
            'column' => $column,
            'search' => $search
          );

          $queryString = http_build_query($queries,'','&');

          $prePage =  $pageNo - 1;
          $nextPage = $pageNo + 1;
          $preDisabled = $prePage < 1 ? "disabled" : "";
          $nextDisabled = $nextPage > $pageTotal ? "disabled" : "";
          
          echo "<div class='float-right'>目前頁 ： 第 $pageNo 頁</div>" ;
          echo "<br>";
          echo "<ul class='pagination d-flex justify-content-center'>";
          echo "<li class='page-item $preDisabled'><a href='User/List?$queryString&pageNo=$prePage' class='page-link'>上一頁</a></li>";
          for($i=1 ; $i<= $pageTotal ; $i++){
              $active = $pageNo == $i ? "active" : "";
            echo "<li class='page-item $active'><a href='User/List?$queryString&pageNo=$i' class='page-link'> $i </a></li>";
          };
          echo "<li class='page-item $nextDisabled'><a href='User/List?$queryString&pageNo=$nextPage' class='page-link'>下一頁</a></li>";
          echo "</ul>";
        };
      ?>

      <form method="post">
        <input type="button" name="checkAll" class="btn btn-sm btn-outline-secondary mb-1" onclick="check_all()" value="全選"></input>
        <input type="button" name="ChangeCheck" class="btn btn-sm btn-outline-secondary mb-1" onclick="change_check()" value="反選"></input>
        <input type="button" name="unCheckAll" class="btn btn-sm btn-outline-secondary mb-1" onclick="un_check_all()" value="取消"></input>
        <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#deleteModal">多筆刪除</button>
        <!-- Modal -->
        <div id="deleteModal" class="modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <p class="ml-3 mt-2">刪除的資料將無法復原，確定要刪除這幾筆資料？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="User/List" >返回</a>
                            <button type="submit" name="deleteSubmit" class="btn btn-danger" >確定刪除</button>
                        </div>
                    </div>
                </div>
            </div>
        
        
        
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
                <th><input type="checkbox" onclick="change_check()"></th>
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
                echo "<tr>";
                echo '<td><input type="checkbox" name="checkBox[]" value='.$user->UserID.'></td>';
                echo "<td>".$user->UserID."</td>";
                echo "<td>".$user->UserName."</td>";
                echo "<td>".$user->NickName."</td>";
                echo "<td>".$chGender."</td>";
                echo "<td>".$user->Birthdate."</td>";
                echo "<td>".$user->Phone."</td>";
                echo "<td>".$user->Email."</td>";
                echo "<td>
                        <a href='/RollinAdmin/User/Detail/$user->UserID' class='btn btn-sm btn-outline-info'>詳細資料</a>
                      </td>";
                echo "<td>
                        <a href='/RollinAdmin/User/Update/$user->UserID' class='btn btn-sm btn-secondary mr-2'> 修改</a>";
                echo   "<a href='/RollinAdmin/User/Delete/$user->UserID' class='btn btn-sm btn-danger'> 刪除</a>
                      </td>";
                echo "</tr>";
              }

            ?>
          </tbody>
        </table>
      </form>
      <?php //下方分頁按鈕
        if($pageTotal>1){
          $queries = array(
            'pageSize' => $pageSize,
            'column' => $column,
            'search' => $search
          );

          $queryString = http_build_query($queries,'','&');

          $prePage =  $pageNo - 1;
          $nextPage = $pageNo + 1;
          $preDisabled = $prePage < 1 ? "disabled" : "";
          $nextDisabled = $nextPage > $pageTotal ? "disabled" : "";
          
          echo "<br>";
          echo "<ul class='pagination d-flex justify-content-center'>";
          echo "<li class='page-item $preDisabled'><a href='User/List?$queryString&pageNo=$prePage' class='page-link'>上一頁</a></li>";
          for($i=1 ; $i<= $pageTotal ; $i++){
              $active = $pageNo == $i ? "active" : "";
            echo "<li class='page-item $active'><a href='User/List?$queryString&pageNo=$i' class='page-link'> $i </a></li>";
          };
          echo "<li class='page-item $nextDisabled'><a href='User/List?$queryString&pageNo=$nextPage' class='page-link'>下一頁</a></li>";
          echo "</ul>";
        };
      ?>
    </div>
  </div>
</div>


<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
//全選
function check_all(){
  var checkitem = document.getElementsByName("checkBox[]");
  for(var i=0 ; i<checkitem.length ;i++){
    checkitem[i].checked = true;
  }
}

//全取消
function un_check_all(){
  var checkitem = document.getElementsByName("checkBox[]");
  for(var i=0 ; i<checkitem.length ;i++){
    checkitem[i].checked = false;
  }
}

//反選
function change_check(){
  var checkitem = document.getElementsByName("checkBox[]");
  for(var i=0 ; i<checkitem.length ;i++){
    checkitem[i].checked = !checkitem[i].checked;
  }
}



// function check_all(){
//   var checkitem = document.form.elements["checkBox[]"];
//   var checkallbtn = document.form.checkAll;
//   console.log(checkbox);
//   for(let i=0 ; i<checkBox.length ; i++){
//   }
// }



</script>