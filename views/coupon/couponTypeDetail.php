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

    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post">
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
              echo "<td>" . '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>' . "&nbsp;";
              echo '<button name="deleteOne" value="' . $coupon->CouponTypeID . '" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="card-footer">
      <a href=<?= '/RollinAdmin/Coupon/List' ?>><button class="btn btn-success float-right btn-sm">返回</button></a>
    </div>
  </div>

  <div class='modal' id='deleteAlert'>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body m-auto">
          <p>是否確定刪除?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
          <form method="post"><button type="submit" class="btn btn-danger btn-sm" name='delete'>刪除</button></form>
        </div>
      </div>
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
  </script>


<?php

require_once 'views/template/footer.php';

?>