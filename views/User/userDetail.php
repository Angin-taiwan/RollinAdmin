<?php

$pageDir = "User";
$pageTitle = "User Detail";

$users = $data->getUserById($data->id); 

require_once 'views/template/header.php';

?>
<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <table >
          <thead>
            <tr>
              <th>欄位</th>
              <th>資料</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>會員ID</td>
              <td><?= $users->UserID?></td>            
            </tr>
            <tr>
              <td>姓名</td>
              <td><?= $users->UserName?></td>            
            </tr>
            <tr>
              <td>暱稱</td>
              <td><?= $users->NickName?></td>            
            </tr>
            <tr>
              <td>性別</td>
              <td><?= $users->Gender?></td>            
            </tr>
            <tr>
              <td>生日</td>
              <td><?= $users->Birthdate?></td>            
            </tr>
            <tr>
              <td>電話</td>
              <td><?= $users->Phone?></td>            
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $users->Email?></td>            
            </tr>
            <tr>
              <td>密碼</td>
              <td><?= $users->Password?></td>            
            </tr>
            <tr>
              <td>國家</td>
              <td><?= $users->Country?></td>            
            </tr>
            <tr>
              <td>城市</td>
              <td><?= $users->City?></td>            
            </tr>
            <tr>
              <td>行政區</td>
              <td><?= $users->District?></td>            
            </tr>
            <tr>
              <td>地址</td>
              <td><?= $users->Address?></td>            
            </tr>
            <tr>
              <td>郵遞區號</td>
              <td><?= $users->PostalCode?></td>            
            </tr>
            <tr>
              <td>註冊日期</td>
              <td><?= $users->CreateDate?></td>            
            </tr>
            <?php
          
            
            
            ?>
            
          </tbody>
        </table>
      
      </div>
    </div>  
  </div>

</div>
  







<?php

require_once 'views/template/footer.php';

?>