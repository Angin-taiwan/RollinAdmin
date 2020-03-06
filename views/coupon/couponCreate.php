<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Create";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券新增";

require_once 'views/template/header.php';

$coupon = new Coupon();

$quantityErr = $priceErr = $priceconditionErr = $enddateErr = $expenddateErr = "";
$cname = $ccode = $cquantity = $ctype = $cpricetype = $cprice = $cpricecondition = $cstartdate = $cenddate = $cexpenddate = "";
$ccoupontypename = $coupontypenameErr = '';
$ctype = '-1';
$page = 1;
if (isset($_POST['add'])) {
  $quantityErr = $priceErr = $priceconditionErr = $enddateErr = $expenddateErr = "";
  if (!is_numeric($_POST['couponQuantity'])) {
    if ($_POST['couponQuantity'] != 'all')
      $quantityErr = '數量需>0';
  } else {
    if (intval($_POST['couponQuantity']) <= 0)
      $quantityErr = '數量需>0';
  }

  if (!is_numeric($_POST['couponPrice'])) {
    $priceErr = '金額或折數需>0';
  } else {
    if (intval($_POST['couponPrice']) <= 0)
      $priceErr = '金額或折數需>0';
    else if ($_POST['couponPrice'] == 'value' && intval($_POST['couponPrice']) > 100)
      $priceErr = '折數不可大於100%';
  }

  if (!is_numeric($_POST['couponPriceCondition']))
    $priceconditionErr = '滿額數量需>0';
  else {
    if (intval($_POST['couponPriceCondition']) <= 0)
      $priceconditionErr = '滿額數量需>0';
    else if ($_POST['priceType'] == 'price' && is_numeric($_POST['couponPrice']) == true && intval($_POST['couponPriceCondition']) < intval($_POST['couponPrice']))
      $priceconditionErr = '滿額金額>=折扣金額';
  }

  if ($_POST['couponEndDate'] < $_POST['couponStartDate'])
    $enddateErr = '結束領取時間需晚於開始領取/使用時間';
  if ($_POST['couponExpEndDate'] < $_POST['couponStartDate'])
    $expenddateErr = '結束時間需晚於開始領取/使用時間';
  if ($_POST['couponExpEndDate'] < $_POST['couponEndDate'])
    $expenddateErr = '結束時間需晚於結束領取時間';

  if ($quantityErr == "" && $priceErr == "" && $priceconditionErr == "" && $enddateErr == "" && $expenddateErr == "") {
    $coupon->CouponName = $_POST['couponName'];
    $coupon->CouponCode = $_POST['couponCode'];
    $coupon->CouponTypeID = $_POST['couponType'];
    if ($_POST['couponQuantity'] == 'all')
      $coupon->CouponQuantity = 99999999999;
    else
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
  } else {
    $cname = $_POST["couponName"];
    $ccode = $_POST['couponCode'];
    $ctype = $_POST['couponType'];
    if ($quantityErr == "")
      $cquantity = $_POST['couponQuantity'];
    if ($priceErr == '')
      $cprice = $_POST['couponPrice'];
    $cpricetype = $_POST['priceType'];
    if ($priceconditionErr == '')
      $cpricecondition = $_POST['couponPriceCondition'];
    $cstartdate = $_POST['couponStartDate'];
    if ($enddateErr == '')
      $cenddate = $_POST['couponEndDate'];
    if ($expenddateErr == '')
      $cexpenddate = $_POST['couponExpEndDate'];
  }
}


if (isset($_POST['addCouponType'])) {
  $coupontypenameErr = '';
  $coupon->CouponTypeName = $_POST['couponTypeName2'];
  if ($data->createCouponType($coupon) == 'error') {
    $ccoupontypename = $_POST['couponTypeName2'];
    $coupontypenameErr = '已有"' . $_POST['couponTypeName2'] . '"類別，無法新增';
    $page = 2;
  }
  $page = 2;
}


?>


<head>
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
<style>
  .error {
    color: red;
    font-size: 10pt;
  }

  select {
    border: 1px solid #d2d2d2;
    padding: 5px;
  }
</style>
</head>


<div class="container-fluid">
  <button class="btn btn-dark btn-md mb-2" type="button" onclick='addPage(1);'>折價券新增</button>
  <button class="btn btn-dark btn-md mb-2" type="button" onclick='addPage(2);'>折價券類型新增</button>
  <div class="card">
    <div class="card-body">
      <form method="post" action="" id="card1" <?php if ($page == 1) {
                                                  echo "style='display:block'";
                                                } else {
                                                  echo "style='display:none'";
                                                } ?>>
        <label for="couponName" class="col-md-4 col-sm-12">名稱</i></label>
        <input class="col-md-4 col-sm-8" type="text" id='couponName' name='couponName' value="<?php echo $cname; ?>" required>
        <br>
        <label for="couponCode" class="col-md-4 col-sm-12">折價券代碼</label>
        <input class="col-md-4 col-sm-8" type="text" id='couponCode' name='couponCode' value="<?php echo $ccode; ?>">
        <br>
        <label for="couponType" class="col-md-4 col-sm-12">類型</label>
        <select class="col-md-4 col-sm-8 d-inline" id="couponType" name='couponType' required>
          <option value="-1" hidden>請選擇</option>
          <?php
          $types = $data->getCouponType();
          foreach ($types as $type) {
            echo '<option value = "' . $type->CouponTypeID . '" ';
            if ($ctype == $type->CouponTypeID)
              echo 'selected';
            echo '>' . $type->CouponTypeName . '</option>';
          }
          ?>
        </select>
        <br>
        <label for="couponQuantity" class="col-md-4 col-sm-12">數量(全店適用請填all)</label>
        <input class="col-md-4 col-sm-8" type="text" id='couponQuantity' name='couponQuantity' value="<?php echo $cquantity; ?>" required>
        <span class="error col-4"><?php echo $quantityErr; ?></span>
        <br>
        <label for="priceType" class="col-md-4 col-sm-12">折扣類型</label>
        <select class="col-md-4 col-sm-8 d-inline" id="priceType" name='priceType' value="<?php echo $cpricetype; ?>" required>
          <option value="" disabled selected hidden>請選擇</option>
          <option value="price" <?php if ($cpricetype == 'price') echo 'selected'; ?>>折價</option>
          <option value="discount" <?php if ($cpricetype == 'discount') echo 'selected'; ?>>打折</option>
        </select>
        <br>
        <label for="couponPrice" class="col-md-4 col-sm-12">金額(元)/折數(%)</label>
        <input class="col-md-4 col-sm-8" type="text" id='couponPrice' name='couponPrice' value="<?php echo $cprice; ?>" required>
        <span class="error col-4"><?php echo $priceErr; ?></span>
        <br>
        <label for="couponPriceCondition" class="col-md-4 col-sm-12">滿額可用</label>
        <input class="col-md-4 col-sm-8" type="text" id='couponPriceCondition' name='couponPriceCondition' value="<?php echo $cpricecondition; ?>" required>
        <span class="error col-4"><?php echo $priceconditionErr; ?></span>
        <br>
        <label for="couponStartDate" class="col-md-4 col-sm-12">開始領取/使用時間</label>
        <input class="col-md-4 col-sm-8" type="datetime-local" id='couponStartDate' name='couponStartDate' value="<?php echo $cstartdate; ?>" required>
        <br>
        <label for="couponEndDate" class="col-md-4 col-sm-12">結束領取時間</label>
        <input class="col-md-4 col-sm-8" type="datetime-local" id='couponEndDate' name='couponEndDate' value="<?php echo $cenddate; ?>" required>
        <span class="error col-4"><?php echo $enddateErr; ?></span>
        <br>
        <label for="couponExpEndDate" class="col-md-4 col-sm-12">結束時間</label>
        <input class="col-md-4 col-sm-8" type="datetime-local" id='couponxpEndDate' name='couponExpEndDate' value="<?php echo $cexpenddate; ?>" required>
        <span class="error col-4"><?php echo $expenddateErr; ?></span>
        <br>
        <input type='submit' class="btn btn-success float-left btn-sm mt-3" name='add' value='新增'>
      </form>
      <form method="post" action="" id="card2" <?php if ($page == 1) {
                                                  echo "style='display:none'";
                                                } else {
                                                  echo "style='display:block'";
                                                } ?>>
        <label for="couponTypeName2" class="col-4">折價券類型名稱</label>
        <input class="col-4" type="text" id='couponTypeName2' name='couponTypeName2' value="<?php echo $ccoupontypename; ?>" required>
        <span class="error col-4"><?php echo $coupontypenameErr; ?></span>
        <br>
        <input type='submit' class="btn btn-success float-left btn-sm" name='addCouponType' value='新增' required>
      </form>
    </div>
    <div class="card-footer">
      <button class="btn btn-dark btn-sm ml-2" onclick="goback();">返回</button>

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

  function goback() {
    window.history.back();
  }
</script>

<?php

require_once 'views/template/footer.php';

?>