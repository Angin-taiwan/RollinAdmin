<?php

$pageDir = "User";
$pageTitle = "User Update";

$user = $data->getUserById($data->id); 


if(isset($_POST['submit'])){
    $user->UserName = $_POST['userName'];
    $user->NickName = $_POST['nickName'];
    $user->Gender = $_POST['gender'];
    $user->Birthdate = $_POST['birthday'];
    $user->Phone = $_POST['phone'];
    $user->Email = $_POST['mail'];
    $user->Password = $_POST['password'];
    $user->Country = $_POST['country'];
    $user->City = $_POST['city'];
    $user->District = $_POST['district'];
    $user->Address = $_POST['address'];
    $user->PostalCode = $_POST['postalcode'];
    $user->CreateDate = date('Y-m-d H:i:s');
    $data->updateUser($user);
    if ($user->UserID) {
      header("Location: ../Detail/$user->UserID");
      exit();
    }
  }


require_once 'views/template/header.php';

?>



<div class="container-fluid">
  <div class="col-md-8 mx-auto">
    <form method="post" action="User/Update/<?= $user->UserID?>" >
      <div class="card p-3">
        <div class="card-body">
          <table class="table table-bordered table-sm">
            <thead class="table-info">
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
                <td>
                  <input type="text" id="userNamelnput" name="userName"  placeholder="輸入真實姓名" class="form-control input-sm"
                  value="<?= $user->UserName?>">
                </td>            
              </tr>
              <tr>
                <td>暱稱</td>
                <td>
                  <input type="text" id="nickNamelnput" name="nickName" class="form-control" placeholder="輸入暱稱"
                  value="<?= $user->NickName?>">
                </td>            
              </tr>
              <tr>
                <td>性別</td>
                <td>
                  <input type="radio" id="male" name="gender" value="M"
                  <?php if("$user->Gender" == "M"): ?> checked="checked" <?php endif;?> >
                  <label for="male" class="font form-check-label">男</label>&emsp;&emsp;
                  <input type="radio" id="female" name="gender" value="F"
                  <?php if("$user->Gender" == "F"): ?> checked="checked" <?php endif;?> >
                  <label for="female" class="font form-check-label">女</label>&emsp;&emsp;
                  <input type="radio" id="other" name="gender" value="U"
                  <?php if("$user->Gender" == "U"): ?> checked="checked" <?php endif;?> >
                  <label for="other" class="font form-check-label">其他</label>
                </td>            
              </tr>
              <tr>
                <td>生日</td>
                <td>
                  <input type="date" id="userBirdaylnput" name="birthday" class="form-control"
                  value="<?= $user->Birthdate?>">
                </td>            
              </tr>
              <tr>
                <td>電話</td>
                <td>
                  <input type="text" id="userPhonelnput" name="phone" class="form-control" placeholder="格式範例 0911222333"
                  value="<?= $user->Phone?>">
                </td>            
              </tr>
              <tr>
                <td>Email</td>
                <td>
                  <input type="text" id="userMaillnput" name="mail" class="form-control" placeholder="輸入email"
                  value="<?= $user->Phone?>">
                </td>            
              </tr>
              <tr>
                <td>密碼</td>
                <td>
                  <input type="text" id="userPassInput" name="password" class="form-control" placeholder="輸入6-8位密碼"
                  value="<?= $user->Password?>">
                </td>            
              </tr>
              <tr>
                <td>國家</td>
                <td>
                  <input type="text" id="userCountrylnput" name="country" class="form-control" placeholder="輸入國家"
                  value="<?= $user->Country?>">
                </td>            
              </tr>
              <tr>
                <td>縣市</td>
                <td>
                  <input type="text" id="userCitylnput" name="city" class="form-control" placeholder="輸入縣市"
                  value="<?= $user->City?>">
                </td>            
              </tr>
              <tr>
                <td>區鄉鎮</td>
                <td>
                  <input type="text" id="userDistlnput" name="district" class="form-control" placeholder="輸入區鄉鎮"
                  value="<?= $user->District?>">
                </td>            
              </tr>
              <tr>
                <td>地址</td>
                <td>
                  <input type="text" id="userAddrlnput" name="address" class="form-control" placeholder="輸入地址"
                  value="<?= $user->Address?>">
                </td>            
              </tr>
              <tr>
                <td>郵遞區號</td>
                <td>
                  <input type="text" id="userPostInput" name="postalcode" class="form-control"
                  value="<?= $user->PostalCode?>">
                </td>            
              </tr>
            </tbody>
          </table>
          <span class="float-right mt-4">
            <button type="submit" name="submit" class="btn btn-info font" >送出</button>
            <a class="btn btn-secondary font" href="/RollinAdmin/User/List/">返回表單</a>
          </span>
        </div>
      </div>
    </form>
  </div>
</div>




<?php

require_once 'views/template/footer.php';

?>