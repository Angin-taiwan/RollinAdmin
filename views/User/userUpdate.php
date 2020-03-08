<?php

$pageDir = "User";
$pageTitle = "User Update";

$pageDirTW = "會員管理";
$pageTitleTW = "會員資料修改";

$user = $data->getUserById($data->id); 


if(isset($_POST['submit'])){
    $user->UserName = $_POST['userName'];
    $user->NickName = $_POST['nickName'];
    $user->Gender = $_POST['gender'];
    $user->Birthdate = $_POST['birthday'];
    $user->Phone = $_POST['phone'];
    $user->Password = $_POST['password'];
    $user->Country = $_POST['country'];
    $user->City = $_POST['city'];
    $user->District = $_POST['district'];
    $user->Address = $_POST['address'];
    $user->PostalCode = $_POST['postalcode'];
    //$user->CreateDate = date('Y-m-d H:i:s');
    $data->updateUser($user);
    if ($user->UserID) {
      header("Location: ../Detail/$user->UserID");
      exit();
    }
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
    <form method="post" action="User/Update/<?= $user->UserID?>" >
      <div class="card p-3">
        <div class="card-body">
          <table class="table table-bordered table-sm">
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
                <td>姓名<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userNamelnput" name="userName"  placeholder="輸入真實姓名" class="form-control input-sm"
                  value="<?= $user->UserName?>" required>
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
                <td>性別<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="radio" id="male" name="gender" value="M"
                    <?php if("$user->Gender" == "M"): ?> checked="checked" <?php endif;?> required>
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
                <td>生日<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="date" id="userBirdaylnput" name="birthday" class="form-control"
                  value="<?= $user->Birthdate?>" required>
                </td>            
              </tr>
              <tr>
                <td>電話<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userPhonelnput" name="phone" class="form-control" placeholder="格式範例 0911222333"
                  value="<?= $user->Phone?>" required>
                </td>            
              </tr>
              <tr>
                <td>信箱</td>
                <td><?= $user->Email?></td>            
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
            </tbody>
          </table>
          <span class="float-right mt-4">
            <a class="btn btn-secondary font" href="/RollinAdmin/User/List/">返回表單</a>
            <button type="submit" name="submit" class="btn btn-info font" >送出</button>
          </span>
        </div>
      </div>
    </form>
  </div>
</div>




<?php

require_once 'views/template/footer.php';

?>