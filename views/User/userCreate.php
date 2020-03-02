<?php

$pageDir = "User";
$pageTitle = "User Create";

$user = new User();

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
  $user->UserID = $data->createUser($user);
  
  if ($user->UserID) {
    header("Location: Detail/$user->UserID");
    exit();
  }
}


require_once 'views/template/header.php';

?>


<div class="container-fluid">
  <div class="row p-5"> 
    <div class="col-10 mx-auto">
      <div class="card p-5 ">
        <form method="post" action="User/Create" class="form-horizontal">
          <div class="row form-group d-flex align-items-center">
            <label for="userNamelnput" class="control-label col-sm-2 font">姓名</label>
            <div class="col-sm-3">
              <input type="text" id="userNamelnput" name="userName"  placeholder="輸入真實姓名" class="form-control input-sm">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="nickNamelnput" class="control-label col-sm-2 font">暱稱</label>
            <div class="col-sm-3">
              <input type="text" id="nickNamelnput" name="nickName" class="form-control">
            </div>
          </div>


          <div class="row form-group d-flex align-items-center">
            <label for="userGenderInput" class="control-label col-sm-2 font">性別</label>
            <div class="col-sm-6">
              <input type="radio" id="male" name="gender" value="M" class="">
              <label for="male" class="font form-check-label">男</label>&emsp;&emsp;
              <input type="radio" id="female" name="gender" value="F" class="">
              <label for="female" class="font form-check-label">女</label>&emsp;&emsp;
              <input type="radio" id="other" name="gender" value="U" class="">
              <label for="other" class="font form-check-label">其他</label>
            </div>
          </div>

          <div class="row form-group d-flex align-items-center">
            <label for="userBirdaylnput" class="control-label col-sm-2 font">生日</label>
            <div class="col-sm-3">
              <input type="date" id="userBirdaylnput" name="birthday" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPhonelnput" class="control-label col-sm-2 font">電話</label>
            <div class="col-sm-4">
              <input type="text" id="userPhonelnput" name="phone" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userMaillnput" class="control-label col-sm-2 font">信箱</label>
            <div class="col-sm-5">
              <input type="text" id="userMaillnput" name="mail" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPassInput" class="control-label col-sm-2 font">密碼</label>
            <div class="col-sm-5">
              <input type="password" id="userPassInput" name="password" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userCountrylnput" class="control-label col-sm-2 font">國家</label>
            <div class="col-sm-3">
              <input type="text" id="userCountrylnput" name="country" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userCitylnput" class="control-label col-sm-2 font">縣市</label>
            <div class="col-sm-3">
              <input type="text" id="userCitylnput" name="city" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userDistlnput" class="control-label col-sm-2 font">區鄉鎮</label>
            <div class="col-sm-3">
              <input type="text" id="userDistlnput" name="district" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userAddrlnput" class="control-label col-sm-2 font">地址</label>
            <div class="col-sm-9">
              <input type="text" id="userAddrlnput" name="address" class="form-control">
            </div>
          </div>
          <div class="row form-group d-flex align-items-center">
            <label for="userPostInput" class="control-label col-sm-2 font">郵遞區號</label>
            <div class="col-sm-3">
              <input type="text" id="userPostInput" name="postalcode" class="form-control">
            </div>
          </div>
          <!-- <div class="row form-group d-flex align-items-center">
            <label for="userSignDateInput" class="control-label col-sm-2 font">註冊日期</label>
            <div class="col-sm-3">
              <input type="text" id="userSignDateInput" name="signDate" class="form-control">
            </div>
          </div> -->
          <span class="float-right mt-4">
            <button type="submit" name="submit" class="btn btn-info font" >送出</button>
            <a class="btn btn-secondary font" href="/RollinAdmin/User/List/">返回表單</a>
          </span>
        </form>
      </div>
    </div>
  </div>
</div>







<?php

require_once 'views/template/footer.php';

?>