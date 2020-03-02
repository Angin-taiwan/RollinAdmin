<?php

$pageDir = "User";
$pageTitle = "User Detail";

$users = $data->getUserById($data->id); 

require_once 'views/template/header.php';

?>


<div class="container-fluid">
  <div class="col-md-8 mx-auto">
    <div class="card p-3">
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm">
          <thead class="table-info">
            <tr>
              <th class="th">欄位</th>
              <th class="th">資料</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="td">會員ID</td>
              <td><?= $users->UserID?></td>            
            </tr>
            <tr>
              <td class="td">姓名</td>
              <td><?= $users->UserName?></td>            
            </tr>
            <tr>
              <td class="td">暱稱</td>
              <td><?= $users->NickName?></td>            
            </tr>
            <tr>
              <td class="td">性別</td>
              <td><?= $users->Gender?></td>            
            </tr>
            <tr>
              <td class="td">生日</td>
              <td><?= $users->Birthdate?></td>            
            </tr>
            <tr>
              <td class="td">電話</td>
              <td><?= $users->Phone?></td>            
            </tr>
            <tr>
              <td class="td">Email</td>
              <td><?= $users->Email?></td>            
            </tr>
            <tr>
              <td class="td">密碼</td>
              <td><?= $users->Password?></td>            
            </tr>
            <tr>
              <td class="td">國家</td>
              <td><?= $users->Country?></td>            
            </tr>
            <tr>
              <td class="td">郵遞區號</td>
              <td><?= $users->PostalCode?></td>            
            </tr>
            <tr>
              <td class="td">地址</td>
              <td><?= $users->City?><?= $users->District?><?= $users->Address?></td>            
            </tr>
            <tr>
              <td class="td">註冊日期</td>
              <td><?= $users->CreateDate?></td>            
            </tr>           <tr>
              <td class="td">Coupon</td>
              <td></td>
               <!-- 之後再連Coupon資料 -->
            </tr>
 
            
          </tbody>
        </table>
        <span class="float-right mt-4">
          <a class="btn btn-secondary" href="/RollinAdmin/User/List/">返回表單</a>
          <a class="btn btn-secondary" href="">修改</a>
        </span>
      </div>
    </div>  
  </div>

</div>
  







<?php

require_once 'views/template/footer.php';

?>