<?php

$pageDir = "User";
$pageTitle = "User Create";

$pageDirTW = "會員管理";
$pageTitleTW = "會員新增";

$user = new User();


if(isset($_POST['submit'])){
  if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
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
    $user->UserID = $data->createUser($user);
    $mailDisplay = "d-none";
    if ($user->UserID) {
      header("Location: Detail/$user->UserID");
      exit();
    }
  }else{
      echo "<script>document.getElementById('emialError').innerHTML ='email格式錯誤'</script>";
  } 
};


require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="col-md-8 mx-auto">
    <form method="post" action="User/Create">
      <div class="card p-3">
        <div class="card-body">
          <span id="emialError" class=""></span>
          <table class="table table-bordered table-sm">
            <thead class="table-info">
              <tr>
                <th>欄位</th>
                <th>資料</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>姓名<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userNamelnput" name="userName" placeholder="輸入真實姓名" class="form-control input-sm" required>
                </td>            
              </tr>
              <tr>
                <td>暱稱</td>
                <td>
                  <input type="text" id="nickNamelnput" name="nickName" class="form-control" placeholder="輸入暱稱">
                </td>            
              </tr>
              <tr>
                <td>性別<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="radio" id="male" name="gender" value="M" required>
                  <label for="male" class="font form-check-label">男</label>&emsp;&emsp;
                  <input type="radio" id="female" name="gender" value="F">
                  <label for="female" class="font form-check-label">女</label>&emsp;&emsp;
                  <input type="radio" id="other" name="gender" value="U">
                  <label for="other" class="font form-check-label">其他</label>
                </td>            
              </tr>
              <tr>
                <td>生日<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="date" id="userBirdaylnput" name="birthday" class="form-control" required>
                </td>            
              </tr>
              <tr>
                <td>電話<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userPhonelnput" name="phone" class="form-control" placeholder="格式範例 0911222333" required>
                </td>            
              </tr>
              <tr>
                <td>信箱<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userMaillnput" name="mail" class="form-control" placeholder="輸入email" required>
                </td>            
              </tr>
              <tr>
                <td>密碼<span class="font-weight-bold text-danger ml-1">*</span></td>
                <td>
                  <input type="text" id="userPassInput" name="password" class="form-control" placeholder="輸入密碼" required>
                </td>            
              </tr>
              <tr>
                <td>國家</td>
                <td>
                  <input type="text" id="userCountrylnput" name="country" class="form-control" placeholder="輸入國家">
                </td>            
              </tr>
              <tr>
                <td>縣市</td>
                <td>
                  <input type="text" id="userCitylnput" name="city" class="form-control" placeholder="輸入縣市">
                </td>            
              </tr>
              <tr>
                <td>區鄉鎮</td>
                <td>
                  <input type="text" id="userDistlnput" name="district" class="form-control" placeholder="輸入區鄉鎮">
                </td>            
              </tr>
              <tr>
                <td>地址</td>
                <td>
                  <input type="text" id="userAddrlnput" name="address" class="form-control" placeholder="輸入地址">
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