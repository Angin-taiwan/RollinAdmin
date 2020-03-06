<?php

$pageDir = "Coupon";
$pageTitle = "Coupon TypeUpdate";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券類型編輯";

$coupons = $data->getCouponTypeDetail($data->id);
$nameErr = "";

if (isset($_POST['update'])) {
    $coupons->CouponTypeName = $_POST['couponTypeName'];
    if ($data->updatetype($coupons) == 'error')
        $nameErr = '已有"' . $_POST['couponTypeName'] . '"類別，無法新增';
    else
        header("Location: ../TypeDetail");
}
if (isset($_POST['delete'])) {
    $arr = array();
    array_push($arr, $coupons->CouponTypeID);
    $data->deleteType($arr);
    header("Location: ../TypeDetail");
    exit();
}

require_once 'views/template/header.php';
?>

<style>
    .error {
        color: red;
        font-size: 10pt;
    }
</style>
</head>


<div class="container-fluid">
    <div class="card">
        <div class="card-body" style="overflow:auto;">
            <form method="post" action="">
                <?php
                echo '<label for="couponTypeName" class="col-md-4 col-sm-12">折價券類型名稱</i></label>
                      <input class="col-md-4 col-sm-8" type="text" name="couponTypeName" value="' . $coupons->CouponTypeName . '" required>';
                echo '<span class="error col-4">' . $nameErr . '</span>';
                echo '<br>';
                ?>
                <button type="submit" name="update" class="btn btn-primary btn-sm">修改</button>
                <button type="submit" onclick="return deletealert();" name="delete" class="btn btn-danger btn-sm">刪除</button>
            </form>
        </div>
        <div class="card-footer">
            <a href="/RollinAdmin/Coupon/TypeDetail"><button class="btn btn-dark float-right btn-sm">返回</button></a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    function deletealert() {
        return confirm('是否確定刪除?\n註:擁有此券的使用者資料會一同刪除')
    }
</script>
<?php

require_once 'views/template/footer.php';

?>