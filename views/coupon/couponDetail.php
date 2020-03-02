<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Detail";

require_once 'views/template/header.php';

$coupons = $data->getCouponDetail($data->id);

if(isset($_POST['edit'])){
  echo 'edit';
}
if(isset($_POST['delete'])){
  echo 'edit';
}

?>
<div class="container-fluid">
<div class="card">
    <div class="card-header">
      <?php echo '<h4 style="display:inline-block;">'.$coupons->CouponName.'</h4>'?>
      <form method="post" class="float-right">
        <button name="edit" class="btn btn-info btn-sm">編輯</button>
        <button name="delete" class="btn btn-danger btn-sm">刪除</button>
      </form>
    </div>
    <div class="card-body" style="overflow:auto;">
    <table class="table table-bordered table-hover" style="width: 80%;">
      <?php 
        echo '<tr> <td>編號</td> <td>'.$coupons->CouponID.'</td></tr>';
        echo '<tr> <td>折價券代碼</td> <td>'.$coupons->CouponCode.'</td></tr>';
        echo '<tr> <td>類型</td> <td>'.$coupons->CouponTypeID.'</td></tr>';
        echo '<tr> <td>折扣價錢/比例</td> <td>'.$coupons->Price.'</td></tr>';
        echo '<tr> <td>折扣條件(滿額)</td> <td>'.$coupons->PriceCondition.'</td></tr>';
      ?>
      </table>
    </div>
    <div class="card-footer">
      <button class="btn btn-success float-right btn-sm" onclick="javascript:history.go(-1)">返回</button>  
  </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>