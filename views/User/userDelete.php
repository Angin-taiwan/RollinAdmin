<?php

$pageDir = "User";
$pageTitle = "User Delete";

$pageDirTW = "會員管理";
$pageTitleTW = "會員刪除";

$user = $data->getUserById($data->id); 

if(isset($_POST['delete'])){
    $data->deleteUser([$user->UserID]);
    header("Location: ../List");
    exit();
}

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
        <form method="post" action="User/Delete/<?= $user->UserID?>">
            <table class="table table-bordered">
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
                        <td>Email</td>
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
                </tbody>
            </table>
            
            <span class="float-right mt-4">
                <a class="btn btn-secondary" href="/RollinAdmin/User/List/">返回表單</a>
                <!-- Modal button -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">刪除</button>
            </span>
            <!-- Modal -->
            <div id="deleteModal" class="modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <p class="ml-3 mt-2">刪除的資料將無法復原，確定要刪除這筆資料？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="User/Delete/<?= $user->UserID?>" >返回</a>
                            <button type="submit" name="delete" class="btn btn-danger" >確定刪除</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>  
  </div>
</div>




<?php

require_once 'views/template/footer.php';

?>