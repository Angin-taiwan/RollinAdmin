<?php

$pageDir = "User";
$pageTitle = "User Create";

// $users= $data->createUser($data->UserAddArray); //待確認對不對

require_once 'views/template/header.php';

?>

<style>
*{
  font-family: 微軟正黑體;
}
</style>

<div class="container-fluid">
  <div class="row"> 
    <div class="col-8 mx-auto">
      <div class="card">
        <form action="" method="post" class="form-horizontal pl-4 pt-3">
          <div class="row form-group">
            <label for="UserNamelnpu" class="control-label col-sm-1">姓名</label>
            <div class="col-sm-4">
              <input type="text" id="UserNamelnput" name="userName" class="form-control">
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