<?php

$pageDir = "Coupon";
$pageTitle = "Coupon User";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券使用情況";

$createErr = "";

if ($data->id != 'all')
  $coupons = $data->getCouponUser($data->id);
else
  $coupons = $data->getCouponUser('all');


if (isset($_POST['createusercoupon'])) {
  $coupon = new Coupon();
  $coupon->UserID = $_POST['user'];
  $coupon->CouponID = $_POST['usercoupon'];
  $result = $data->createCouponUser($coupon);

  if ($result == 'error') {
    $user = $data->getUserById($coupon->UserID);
    $cou = $data->getCouponDetail($coupon->CouponID);
    $createErr = '*' . $user->UserName . '已有"' . $cou->CouponName . '"折價券';
  } else {
    $createErr = '';
    header("Location: ../User/$data->id");
  }
  // echo $result.' '.$createErr;
}

if (isset($_POST['delete'])) {
  $arruser = array();
  $arrcoupon = array();
  if (!empty($_POST['check'])) {
    foreach ($_POST['check'] as $check) {
      echo $check;
      array_push($arruser, $_POST['User' . $check]);
      array_push($arrcoupon, $_POST['Coupon' . $check]);
    }
  }
  $data->deleteUser($arruser, $arrcoupon);
  header("Location: ../User/$data->id");
  exit();
}

if (isset($_POST['deleteOne'])) {
  $arruser = array();
  $arrcoupon = array();
  array_push($arruser, $_POST['User' . $_POST['deleteOne']]);
  array_push($arrcoupon, $_POST['Coupon' . $_POST['deleteOne']]);
  $data->deleteUser($arruser, $arrcoupon);
  header("Location: ../User/$data->id");
  exit();
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

  .error {
    color: red;
    font-size: 10pt;
  }

  .coupontable {
    text-align: center;
  }

  .coupontable a {
    color: black;
  }
  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 style="display:inline;" class="my-auto">
        <?php
        if ($data->id != 'all') {
          $coupon = $data->getCouponDetail($data->id);
          echo $coupon->CouponName;
        } else {
          echo '折價券領取/使用狀況';
        }
        ?>
      </h4>
      <button class="btn btn-primary float-right btn-md my-auto" onclick="showmodal();">系統發送</button>
    </div>

    <div class="card-body" style="overflow:auto;">
      <form method="post" action=''>
        <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return deletealert();" name="delete">刪除</button>
        <table class="table table-bordered table-hover coupontable">
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
              <th scope="col">管理</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $n = 0;
            foreach ($coupons as $coupon) {
              $n++;
              echo "<tr>";
              echo "<td><input type='checkbox' name = 'check[]' value='" . $n . "'id = 'UserCouponCheckbox" . $n . "'></td>";
              if ($data->id == 'all') {
                echo "<td><input type='hidden' name='Coupon" . $n . "' value='" . $coupon->CouponID . "'><a href='/RollinAdmin/Coupon/Detail/" . $coupon->CouponID . "'>" . $coupon->CouponName . "</a></td>";
              } else
                echo " <input type='hidden' name='Coupon" . $n . "' value='" . $coupon->CouponID . "'>";
              echo "<td><input type='hidden' name='User" . $n . "' value='" . $coupon->UserID . "'><a href='/RollinAdmin/User/Detail/" . $coupon->UserID . "'>" . $coupon->UserName . "</a></td>";
              echo "<td><a href='/RollinAdmin/Order/Detail/" . $coupon->OrderID . "'>" . $coupon->OrderID . "</a></td>";
              echo "<td>";
              // echo '<button name="edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
              // echo '&nbsp;';
              echo '<button name="deleteOne" onclick="return deletealert();"value="' . $n . '" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
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
        echo '<a href=/RollinAdmin/Coupon/List><button class="btn btn-outline-dark float-right btn-sm">返回</button></a>';
      else
        echo '<a href=/RollinAdmin/Coupon/Detail/' . $data->id . '><button class="btn btn-outline-dark float-right btn-sm">返回</button></a>';
      ?>

    </div>
  </div>

  <div class='modal' id='addusercoupon' style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <span>折價券發送</span>
          <button type="button" class="close">
            <span aria-hidden="true" onclick='showmodal();'>&times;</span><span class="sr-only">Close</span></button>
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
                  echo '<option value="' . $allcoupon->CouponID . '" >' . $allcoupon->CouponName . '</option>';
                }
              }
              ?>
            </select>
            <span class="error"><?php if ($createErr != '') echo '<br>';
                                echo $createErr; ?></span>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm" name='createusercoupon'>新增</button>
            <button type="button" class="btn btn-default btn-sm" onclick='showmodal();'>取消</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if ($createErr != '') {
    echo "<script>
    var modal = document.getElementById('addusercoupon');
    modal.style.display = 'block';
    </script>";
  }
  ?>
  <script>
    function deletealert() {
      return confirm('是否確定刪除?\n')
    }

    function selectall() {
      var allornot = document.getElementById("selectallcheckbox");
      var status = allornot.checked;
      var obj = JSON.parse('<?php echo json_encode($coupons) ?>');
      for (i = 1; i <= Object.keys(obj).length; i++) {
        var checkbox = document.getElementById("UserCouponCheckbox" + i);
        checkbox.checked = status;
      }
    }

    function showmodal() {
      var modal = document.getElementById('addusercoupon');
      if (modal.style.display == 'none')
        modal.style.display = 'block';
      else
        modal.style.display = 'none';
    }
  </script>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>