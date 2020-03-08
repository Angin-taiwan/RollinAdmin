<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Detail";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券資訊";

$coupons = $data->getCouponDetail($data->id);

if (isset($_POST['delete'])) {
  $arr = array();
  array_push($arr, $coupons->CouponID);
  $data->delete($arr);
  header("Location: ../List");
  exit();
}

require_once 'views/template/header.php';

?>
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <?php echo '<h4 style="display:inline-block;">' . $coupons->CouponName . '</h4>' ?>
      <div style='float:right'>
        <a <?= 'href=/RollinAdmin/Coupon/User/' . $coupons->CouponID ?>><button name="use" class="btn btn-secondary btn-sm">領取/使用狀況</button></a>
        <a <?= 'href=/RollinAdmin/Coupon/Update/' . $coupons->CouponID ?>><button name="edit" class="btn btn-primary btn-sm">編輯</button></a>
        <form method="post" class="d-inline"> <button class="btn btn-danger btn-sm" onclick="return deletealert();" name="delete">刪除</button></form>
      </div>
    </div>
    <div class="card-body" style="overflow:auto;">
      <table class="table table-bordered table-hover" style="width: 80%;">
        <?php
        echo '<tr> <td>折價券代碼</td> <td>' . $coupons->CouponCode . '</td></tr>';
        echo '<tr> <td>類型</td> <td>' . $coupons->CouponTypeName . '</td></tr>';
        echo '<tr> <td>數量</td> <td>';
        if ($coupons->Quantity >= 2147483647)
          echo 'all';
        else
          echo $coupons->Quantity;
        echo '</td></tr>';
        echo '<tr> <td>金額(元)/折數(%)</td> <td>';
        if ($coupons->Price > 1)
          echo $coupons->Price . '元';
        else
          echo $coupons->Price * 100 . '%';
        echo '</td></tr>';
        echo '<tr> <td>滿額可用</td> <td>' . $coupons->PriceCondition . '</td></tr>';
        echo '<tr> <td>開始領取時間</td> <td>' . $coupons->StartDate . '</td></tr>';
        echo '<tr> <td>結束領取時間</td> <td>' . $coupons->EndDate . '</td></tr>';
        echo '<tr> <td>滿額可用</td> <td>' . $coupons->ExpEndDate . '</td></tr>';
        ?>
      </table>
    </div>
    <div class="card-footer">
      <a href=<?= '/RollinAdmin/Coupon/List' ?>><button class="btn btn-outline-dark float-right btn-sm">返回</button></a>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script>
  function deletealert() {
    return confirm('是否確定刪除?');
  }
</script>


<?php

require_once 'views/template/footer.php';

?>