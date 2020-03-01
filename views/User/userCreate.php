<?php

$pageDir = "User";
$pageTitle = "User Create";

$user = new User();

if(isset($_POST['submit'])){
  $test = $_POST['userName'];
  echo $test;

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
  $user->CreateDate = $_POST['signDate'];
  $user->UserID = $data->createUser($user);
  
  if ($user->UserID) {
    header("Location: Detail/$user->UserID");
    exit();
  }
}


require_once 'views/template/header.php';

?>

<style>
*{
  font-family: 微軟正黑體;
}
</style>

<div class="container-fluid">
  <div class="row"> 
    <div class="col-10 mx-auto">
      <div class="card p-5 ">
        <form method="post" action="User/Create" class="form-horizontal">
          <div class="row form-group d-flex align-items-center">
            <label for="userNamelnput" class="control-label col-sm-2">姓名</label>
            <div class="col-sm-3">
              <input type="text" id="userNamelnput" name="userName" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="nickNamelnput" class="control-label col-sm-2">暱稱</label>
            <div class="col-sm-3">
              <input type="text" id="nickNamelnput" name="nickName" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userGenderInput" class="control-label col-sm-2">性別</label>
            <div class="col-sm-3">
              <input type="text" id="userGenderInput" name="gender" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userBirdaylnput" class="control-label col-sm-2">生日</label>
            <div class="col-sm-3">
              <input type="text" id="userBirdaylnput" name="birthday" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPhonelnput" class="control-label col-sm-2">電話</label>
            <div class="col-sm-4">
              <input type="text" id="userPhonelnput" name="phone" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userMaillnput" class="control-label col-sm-2">信箱</label>
            <div class="col-sm-5">
              <input type="text" id="userMaillnput" name="mail" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPassInput" class="control-label col-sm-2">密碼</label>
            <div class="col-sm-5">
              <input type="text" id="userPassInput" name="password" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userCountrylnput" class="control-label col-sm-2">國家</label>
            <div class="col-sm-3">
              <input type="text" id="userCountrylnput" name="country" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userCitylnput" class="control-label col-sm-2">縣市</label>
            <div class="col-sm-3">
              <input type="text" id="userCitylnput" name="city" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userDistlnput" class="control-label col-sm-2">區鄉鎮</label>
            <div class="col-sm-3">
              <input type="text" id="userDistlnput" name="district" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userAddrlnput" class="control-label col-sm-2">地址</label>
            <div class="col-sm-9">
              <input type="text" id="userAddrlnput" name="address" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPostInput" class="control-label col-sm-2">郵遞區號</label>
            <div class="col-sm-3">
              <input type="text" id="userPostInput" name="postalcode" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userSignDateInput" class="control-label col-sm-2">註冊日期</label>
            <div class="col-sm-3">
              <input type="text" id="userSignDateInput" name="signDate" class="form-control">
            </div>
          </div>
          <span class="float-right mt-4">
            <a class="btn btn-secondary" href="/RollinAdmin/User/List/">返回表單</a>
            <button type="submit" class="btn btn-secondary" >送出</button>
          </span>
        </form>
      </div>
    </div>
  </div>
</div>







<?php

require_once 'views/template/footer.php';

?>