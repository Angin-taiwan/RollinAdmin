<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Create";

require_once 'views/template/header.php';

if (isset($_POST['add'])) {
  //check start end exp date
  if ($_POST['couponExpEndDate'] < $_POST['couponEndDate']) {
    // echo '<script>';
    // echo 'window.alert("err")';  //not showing an alert box.
    // echo '</script>';
    return (false);
    // return;
  }
}
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body" style="overflow:auto;">
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <label for="couponName" class="col-2">名稱</label>
        <input class="col-4" type="text" id='couponName' name='couponName' required="required">
        <br>
        <label for="couponCode" class="col-2">折價券代碼</label>
        <input class="col-4" type="text" id='couponCode' name='couponCode'>
        <br>
        <label for="couponType" class="col-2 ">類型</label>
        <select class="form-control col-4 d-inline" id="couponType" name='couponType' required="required">
          <option value="" disabled selected hidden>請選擇</option>
          <?php
          $types = $data->getCouponType();
          foreach ($types as $type) {
            echo '<option value = "' . $type->CouponTypeNameID . '">' . $type->CouponTypeName . '</option>';
          }
          ?>
        </select>
        <br>
        <label for="couponquantiy" class="col-2">數量</label>
        <input class="col-4" type="text" id='couponquantiy' name='couponquantiy'>
        <br>
        <label for="pricetype" class="col-2">折扣類型</label>
        <select class="form-control col-4 d-inline" id="pricetype" name='pricetype' required="required">
          <option value="" disabled selected hidden>請選擇</option>
          <option value="price">折價</option>
          <option value="discount">打折</option>
        </select>
        <br>
        <label for="couponPrice" class="col-2">金額(元)/折數(%)</label>
        <input class="col-4" type="text" id='couponPrice' name='couponPrice' required="required">
        <br>
        <label for="couponStartDate" class="col-2">開始領取/使用時間</label>
        <input class="col-4" type="datetime-local" id='couponStartDate' name='couponStartDate' required="required">
        <br>
        <label for="couponEndDate" class="col-2">結束領取時間</label>
        <input class="col-4" type="datetime-local" id='couponEndDate' name='couponEndDate' required="required">
        <br>
        <label for="couponExpEndDate" class="col-2">結束時間</label>
        <input class="col-4" type="datetime-local" id='couponxpEndDate' name='couponExpEndDate' required="required">
        <br>
        <input type='submit' class="btn btn-success float-left btn-sm" name='add' value='新增'>
      </form>
    </div>
    <div class="card-footer">
      <button class="btn btn-dark btn-sm ml-2\">返回</button>

    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>