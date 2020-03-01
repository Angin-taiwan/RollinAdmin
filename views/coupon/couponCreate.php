<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Create";

require_once 'views/template/header.php';

$coupon = new Coupon();

if (isset($_POST['add'])) {
  $coupon->CouponName = $_POST['couponName'];
  $coupon->CouponCode = $_POST['couponCode'];
  $coupon->CouponTypeID = $_POST['couponType'];
  $coupon->CouponQuantity = $_POST['couponQuantity'];
  if ($_POST['priceType'] == 'price')
    $coupon->CouponPrice = intval($_POST['couponPrice']);
  else
    $coupon->CouponPrice = intval($_POST['couponPrice']) * 0.01;
  $coupon->CouponPriceCondition = $_POST['couponPriceCondition'];
  $coupon->CouponStartDate = $_POST['couponStartDate'];
  $coupon->CouponEndDate = $_POST['couponEndDate'];
  $coupon->CouponExpEndDate = $_POST['couponExpEndDate'];
  $coupon->CouponID = $data->create($coupon);
}


if (isset($_POST['addCouponType'])) {
  $coupon->CouponTypeName = $_POST['couponTypeName2'];
  $coupon->CouponTypeID= $data->createCouponType($coupon);
  
}
?>

<div class="container-fluid">
  <button class="btn btn-dark btn-md mb-2" type="button" onclick='addPage(1);'>折價券新增</button>
  <button class="btn btn-dark btn-md mb-2" type="button" onclick='addPage(2);'>折價券類型新增</button>
  <div class="card">
    <div class="card-body">
      <form method="post" action="" id="card1">
        <label for="couponName" class="col-2">名稱</label>
        <input class="col-4" type="text" id='couponName' name='couponName'>
        <br>
        <label for="couponCode" class="col-2">折價券代碼</label>
        <input class="col-4" type="text" id='couponCode' name='couponCode'>
        <br>
        <label for="couponType" class="col-2 ">類型</label>
        <select class="form-control col-4 d-inline" id="couponType" name='couponType'>
          <option value="" disabled selected hidden>請選擇</option>
          <?php
          $types = $data->getCouponType();
          foreach ($types as $type) {
            echo '<option value = "' . $type->CouponTypeID . '">' . $type->CouponTypeName . '</option>';
          }
          ?>
        </select>
        <br>
        <label for="couponQuantity" class="col-2">數量</label>
        <input class="col-4" type="text" id='couponQuantity' name='couponQuantity'>
        <br>
        <label for="priceType" class="col-2">折扣類型</label>
        <select class="form-control col-4 d-inline" id="priceType" name='priceType'>
          <option value="" disabled selected hidden>請選擇</option>
          <option value="price">折價</option>
          <option value="discount">打折</option>
        </select>
        <br>
        <label for="couponPrice" class="col-2">金額(元)/折數(%)</label>
        <input class="col-4" type="text" id='couponPrice' name='couponPrice'>
        <br>
        <label for="couponPriceCondition" class="col-2">滿額可用</label>
        <input class="col-4" type="text" id='couponPriceCondition' name='couponPriceCondition'>
        <br>
        <label for="couponStartDate" class="col-2">開始領取/使用時間</label>
        <input class="col-4" type="datetime-local" id='couponStartDate' name='couponStartDate'>
        <br>
        <label for="couponEndDate" class="col-2">結束領取時間</label>
        <input class="col-4" type="datetime-local" id='couponEndDate' name='couponEndDate'>
        <br>
        <label for="couponExpEndDate" class="col-2">結束時間</label>
        <input class="col-4" type="datetime-local" id='couponxpEndDate' name='couponExpEndDate'>
        <br>
        <input type='submit' class="btn btn-success float-left btn-sm" name='add' value='新增'>
      </form>
      <form method="post" action="" id="card2" style="display:none;">
        <label for="couponTypeName2" class="col-2">折價券類型名稱</label>
        <input class="col-4" type="text" id='couponTypeName2' name='couponTypeName2'>
        <br>
        <input type='submit' class="btn btn-success float-left btn-sm" name='addCouponType' value='新增'>
      </form>
    </div>
    <div class="card-footer">
      <button class="btn btn-dark btn-sm ml-2\">返回</button>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<script>
  function addPage(num) {
    if (num == 1) {
      document.getElementById("card1").style.display = "block";
      document.getElementById("card2").style.display = "none";
    } else {
      document.getElementById("card2").style.display = "block";
      document.getElementById("card1").style.display = "none";
    }
  }
</script>

<?php

require_once 'views/template/footer.php';

?>