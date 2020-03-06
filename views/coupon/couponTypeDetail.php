<?php

$pageDir = "Coupon";
$pageTitle = "Coupon TypeDetail";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價類型資訊";

$coupons = $data->getCouponType();

if (isset($_POST['delete'])) {
  $arr = array();
  if (!empty($_POST['check'])) {
    foreach ($_POST['check'] as $check) {
      array_push($arr, $check);
    }
  }
  $data->deleteType($arr);
  header("Location: /RollinAdmin/Coupon/TypeDetail");
  exit();
}
if (isset($_POST['deleteOne'])) {
  $arr = array();
  array_push($arr, $_POST['deleteOne']);
  $data->deleteType($arr);
  header("Location: /RollinAdmin/Coupon/TypeDetail");
  exit();
}
require_once 'views/template/header.php';

?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h4 class="my-auto">折價券類型</h4>
    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post">
        <button type="submit" class="btn btn-danger btn-sm mb-2" name="delete">刪除</button>
        <table class="table table-bordered table-hover" style="width: 80%;">
          <thead>
            <?php
            echo '<th scope="col"><input type="checkbox" id="selectallcheckbox" onclick="selectall();"></th>';
            echo '<th>類型編號</th>';
            echo '<th>類型名稱</th>';
            echo '<th>管理</th></tr>';
            ?>
          </thead>
          <tbody>
            <?php
            foreach ($coupons as $coupon) {
              echo '<tr>';
              echo "<td><input type='checkbox' id = 'CouponListCheckbox" . $coupon->CouponTypeID . "' name = 'check[]' value='" . $coupon->CouponTypeID . "'></td>";
              echo '<td>' . $coupon->CouponTypeID . '</td>';
              echo '<td>' . $coupon->CouponTypeName . '</td>';
              echo "<td>";
              echo '<a href="/RollinAdmin/Coupon/TypeUpdate/' . $coupon->CouponTypeID . '"><button type="button" name="edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>' . "&nbsp;";
              echo '<button name="deleteOne" value="' . $coupon->CouponTypeID . '" onclick="return alert(this);" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="card-footer">
      <a href=<?= '/RollinAdmin/Coupon/List' ?>><button class="btn btn-dark float-right btn-sm">返回</button></a>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script>
  // 全選反選按鈕
  function selectall() {
    var allornot = document.getElementById("selectallcheckbox");
    var status = allornot.checked;
    var obj = JSON.parse('<?php echo json_encode($coupons) ?>');
    for (id in obj) {
      var checkbox = document.getElementById("CouponListCheckbox" + obj[id]['CouponTypeID']);
      checkbox.checked = status;
    }
  }

  function alert() {
    return confirm('是否確定刪除?\n註:擁有此券的使用者資料會一同刪除')
  }
</script>


<?php

require_once 'views/template/footer.php';

?>