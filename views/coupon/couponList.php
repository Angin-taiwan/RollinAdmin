<?php

$pageDir = "Coupon";
$pageTitle = "Coupon List";

require_once 'views/template/header.php';

$coupons  = $data->getCouponList(null);

if (isset($_POST['delete'])) {
  $arr = array();
  if (!empty($_POST['check'])) {
    foreach ($_POST['check'] as $check) {
      array_push($arr, $check);
    }
  }
  // print_r($arr);
  $data = new Coupon();
  $data->delete($arr);
  header("Location: Coupon/List");
  exit();
}

?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      Coupons
      <form>
        <div>關鍵字查詢&nbsp;&nbsp;<input type="textbox"></div>
        <!-- <div>條件式搜尋</div> -->
      </form>



    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post">
        <button type="submit" name="delete">刪除</button>

        <table class="table table-bordered table-hover" style="width: auto; table-layout:fit-content; white-space: nowrap">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" id='selectallcheckbox' onclick="selectall();"></th>
              <th scope="col">編號</th>
              <th scope="col">名稱</th>
              <th scope="col">折價券代碼</th>
              <th scope="col">類型</th>
              <th scope="col">數量</th>
              <th scope="col">折扣價錢/比例</th>
              <th scope="col">折扣條件(滿額)</th>
              <th scope="col">開始領取/使用時間</th>
              <th scope="col">領取截止日</th>
              <th scope="col">使用截止日</th>
              <th scope="col">管理</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($coupons as $coupon) {
              echo "<tr>";
              echo "<td><input type='checkbox' id = 'CouponListCheckbox" . $coupon->CouponID . "' name = 'check[]' value='" . $coupon->CouponID . "'></td>";
              echo "<td>" . $coupon->CouponID . "</td>";
              echo "<td>" . $coupon->CouponName . "</td>";
              echo "<td>" . $coupon->CouponCode . "</td>";
              echo "<td>" . $coupon->CouponTypeName . "</td>";
              if (intval($coupon->Quantity) >= 2147483647)
                echo "<td>" . '全店' . "</td>";
              else
                echo "<td>" . $coupon->Quantity . "</td>";
              if (floatval($coupon->Price) >= 1)
                echo "<td>" . $coupon->Price . "</td>";
              else
                echo "<td>" . floatval($coupon->Price) * 100 . "%" . "</td>";
              echo "<td>" . $coupon->PriceCondition . "</td>";
              echo "<td>" . $coupon->StartDate . "</td>";
              echo "<td>" . $coupon->EndDate . "</td>";
              echo "<td>" . $coupon->ExpEndDate . "</td>";
              echo "<td>" . '<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>' . "&nbsp;" . '<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
              echo "<td></td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="card-footer">Footer</div>
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
      var checkbox = document.getElementById("CouponListCheckbox" + obj[id]['CouponID']);
      checkbox.checked = status;
    }
  }
  // Make the checkbox indeterminate via JavaScript
  // var checkbox = document.getElementById("selectallcheckbox");
  // checkbox.indeterminate = true;
</script>

<?php

require_once 'views/template/footer.php';

?>