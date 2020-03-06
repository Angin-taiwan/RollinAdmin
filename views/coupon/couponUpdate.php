<?php

$pageDir = "Coupon";
$pageTitle = "Coupon Update";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券編輯";

$coupons = $data->getCouponDetail($data->id);
// echo $coupons->CouponID;
$quantityErr = $priceErr = $priceconditionErr = $enddateErr = $expenddateErr = "";

if (isset($_POST['update'])) {
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
        $coupons->CouponName = $_POST['couponName'];
        $coupons->CouponCode = $_POST['couponCode'];
        $coupons->CouponTypeID = $_POST['couponType'];
        if ($_POST['couponQuantity'] == 'all')
            $coupons->CouponQuantity = 99999999999;
        else
            $coupons->CouponQuantity = $_POST['couponQuantity'];
        if ($_POST['priceType'] == 'price')
            $coupons->CouponPrice = intval($_POST['couponPrice']);
        else
            $coupons->CouponPrice = intval($_POST['couponPrice']) * 0.01;
        $coupons->CouponPriceCondition = $_POST['couponPriceCondition'];
        $coupons->CouponStartDate = $_POST['couponStartDate'];
        $coupons->CouponEndDate = $_POST['couponEndDate'];
        $coupons->CouponExpEndDate = $_POST['couponExpEndDate'];
        $data->update($coupons);
        $coupons->CouponID;
        header("Location: /RollinAdmin/Coupon/Detail/$coupons->CouponID");
        exit();
    }
}
if (isset($_POST['delete'])) {
    $arr = array();
    array_push($arr, $coupons->CouponID);
    $data->delete($arr);
    header("Location: ../List");
    exit();
}

require_once 'views/template/header.php';
?>

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
    <div class="card">
        <div class="card-body" style="overflow:auto;">
            <form method="post" action="">
                <?php
                echo '<label for="couponName" class="col-md-4 col-sm-12">名稱</i></label>
                      <input class="col-md-4 col-sm-8" type="text" id="couponName" name="couponName" value="' . $coupons->CouponName . '" required>
                      <br>';
                echo '<label for="couponCode" class="col-md-4 col-sm-12">折價券代碼</label>
                      <input class="col-md-4 col-sm-8" type="text" id="couponCode" name="couponCode" value="' . $coupons->CouponCode . '">
                      <br>';
                echo '<label for="couponType" class="col-md-4 col-sm-12">類型</label>
                      <select class="col-md-4 col-sm-8 d-inline" id="couponType" name="couponType" required>';
                $types = $data->getCouponType();
                foreach ($types as $type) {
                    echo '<option value = "' . $type->CouponTypeID . '" ';
                    if ($coupons->CouponTypeID == $type->CouponTypeID)
                        echo 'selected';
                    echo '>' . $type->CouponTypeName . '</option>';
                }
                echo '</select><br>';
                echo '<label for="couponQuantity" class="col-md-4 col-sm-12">數量(全店適用請填all)</label>
                     <input class="col-md-4 col-sm-8" type="text" id="couponQuantity" name="couponQuantity" value="';
                if ($coupons->Quantity >= 2147483647)
                    echo 'all';
                else
                    echo $coupons->Quantity;
                echo '" required>
                      <span class="error col-4">' . $quantityErr . '</span>
                      <br>';
                echo '<label for="priceType" class="col-md-4 col-sm-12">折扣類型</label>
                      <select class="col-md-4 col-sm-8 d-inline" id="priceType" name="priceType" value="" required>
                      <option value="price"';
                if ($coupons->Price > 1)
                    echo 'selected>';
                echo '折價</option> <option value="discount"';
                if ($coupons->Price < 1 && $coupons->Price > 0)
                    echo 'selected';
                echo '>打折</option>
                      </select>
                      <br>';
                echo '<label for="couponPrice" class="col-md-4 col-sm-12">金額(元)/折數(%)</label>
                      <input class="col-md-4 col-sm-8" type="text" id="couponPrice" name="couponPrice" value="';
                if ($coupons->Price < 1)
                    echo $coupons->Price * 100;
                else
                    echo $coupons->Price;
                echo '" required>
                        <span class="error col-4">' . $priceErr . '</span>
                        <br>';
                echo '<label for="couponPriceCondition" class="col-md-4 col-sm-12">滿額可用</label>
                      <input class="col-md-4 col-sm-8" type="text" id="couponPriceCondition" name="couponPriceCondition" value="' . $coupons->PriceCondition . '" required>
                      <span class="error col-4">' . $priceconditionErr . '</span>
                      <br>';
                echo '<label for="couponStartDate" class="col-md-4 col-sm-12">開始領取/使用時間</label>
                      <input class="col-md-4 col-sm-8" type="datetime-local" id="couponStartDate" name="couponStartDate" value="' . date('Y-m-d\TH:i:s', strtotime($coupons->StartDate)) . '" required>
                      <br>';
                echo '<label for="couponEndDate" class="col-md-4 col-sm-12">結束領取時間</label>
                      <input class="col-md-4 col-sm-8" type="datetime-local" id="couponEndDate" name="couponEndDate" value="' . date('Y-m-d\TH:i:s', strtotime($coupons->EndDate)) . '" required>
                      <span class="error col-4">' . $enddateErr . '</span>
                      <br>';
                echo '<label for="couponExpEndDate" class="col-md-4 col-sm-12">結束時間</label>
                      <input class="col-md-4 col-sm-8" type="datetime-local" id="couponxpEndDate" name="couponExpEndDate" value="' . date('Y-m-d\TH:i:s', strtotime($coupons->ExpEndDate)) . '" required>
                      <span class="error col-4">' . $expenddateErr . '</span>
                      <br>';
                ?>
                <button type="submit" name="update" class="btn btn-primary btn-sm">修改</button>
                <button type="submit" onclick="deletealert();" name="delete" class="btn btn-danger btn-sm">刪除</button>
            </form>
        </div>
        <div class="card-footer">
            <a href="/RollinAdmin/Coupon/Detail/<?= $data->id?>"><button class="btn btn-dark float-right btn-sm">返回</button></a>
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