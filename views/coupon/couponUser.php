<?php

$pageDir = "Coupon";
$pageTitle = "Coupon User";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券使用情況";

if ($data->id != 'all')
  $coupons = $data->getCouponUser($data->id);
else
  $coupons = $data->getCouponUser('all');


if (isset($_POST['createusercoupon'])) {
  $coupon = new Coupon();
  $coupon->UserID = $_POST['user'];
  $coupon->CouponID = $_POST['usercoupon'];
  // echo $coupon->UserID.' '.$coupon->CouponID;
  $coupon->CouponID = $data->createCouponUser($coupon);
  header("Location: ../User/$data->id");
}



require_once 'views/template/header.php';
?>


<style>
  .theadbtn {
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
  }
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 style="display:inline-block; text-align:center">
        <?php
        if ($data->id != 'all') {
          $coupon = $data->getCouponDetail($data->id);
          echo $coupon->CouponName;
        } else {
          echo '折價券領取/使用狀況';
        }
        ?>
      </h4>
      <vutton class="btn btn-info float-right btn-md" data-toggle="modal" data-target='#addusercoupon'>系統發送</button>
    </div>

    <div class="card-body" style="overflow:auto;">
      <form method="post" action=''>
        <button type="submit" class="btn btn-danger btn-sm mb-2" name="delete">刪除</button>
        <table class="table table-bordered table-hover" style="width: auto; table-layout:fit-content; white-space: nowrap">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" id='selectallcheckbox' onclick="selectall();"></th>
              <?php
              if ($data->id == 'all') {
                echo '<th scope="col"><button class="theadbtn" name="thead" value="tid">折價券名稱&nbsp;</button></th>';
              }
              ?>
              <th scope="col"><button class='theadbtn' name='thead' value="tid">會員&nbsp;</button></th>
              <th scope="col"><button class='theadbtn' name='thead' value="tid">訂單&nbsp;</button></th>
              <th scope="col">刪除</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($coupons as $coupon) {
              echo "<tr>";
              echo "<td><input type='checkbox' id = 'CouponListCheckbox" . $coupon->CouponID . "' name = 'check[]' value='" . $coupon->CouponID . "'></td>";
              if ($data->id == 'all') {
                echo "<td><a href='/RollinAdmin/Coupon/Detail/" . $coupon->CouponID . "'>" . $coupon->CouponName . "</a></td>";
              }
              echo "<td><a href='/RollinAdmin/User/Detail/" . $coupon->UserID . "'>" . $coupon->UserName . "</a></td>";
              echo "<td><a href='/RollinAdmin/Order/Detail/" . $coupon->OrderID . "'>" . $coupon->OrderID . "</a></td>";
              echo "<td>";
              echo '<button name="deleteOne" value="' . $coupon->CouponID . '" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </form>
    </div>

    <div class="card-footer">
      <?php
      if ($data->id == 'all')
        echo '<a href=/RollinAdmin/Coupon/List><button class="btn btn-success float-right btn-sm">返回</button></a>';
      else
        echo '<a href=/RollinAdmin/Coupon/Detail/' . $data->id . '><button class="btn btn-success float-right btn-sm">返回</button></a>';
      ?>

    </div>
  </div>

  <div class='modal' id='addusercoupon'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span>折價券發送</span>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <form method='post'>
          <div class="modal-body">

            <label for="user" class="col-4">會員</label>
            <select name="user" class="col-4">
              <?php
              $users = $data->getUserName();
              foreach ($users as $user) {
                echo '<option value="' . $user->UserID . '">' . $user->UserName . '</option>';
              }
              ?>
            </select>
            <br>
            <label for="usercoupon" class="col-4">折價券</label>
            <select name="usercoupon" class="col-4">
              <?php
              if ($data->id != 'all')
                echo '<option value="' . $coupon->CouponID . '" selected>' . $coupon->CouponName . '</option>';
              else {
                $allcoupons = $data->getAll();
                foreach ($allcoupons as $allcoupon) {
                  echo '<option value="' . $allcoupon->CouponID . '" selected>' . $allcoupon->CouponName . '</option>';
                }
              }
              ?>
            </select>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-sm" name='createusercoupon'>新增</button>
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>