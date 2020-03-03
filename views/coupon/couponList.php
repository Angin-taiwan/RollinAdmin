<?php

$pageDir = "Coupon";
$pageTitle = "Coupon List";

$coupons  = $data->getCouponList($data);
$s = 1;
if (isset($data->sortnum))
  $s = $data->sortnum;
$n = '';
if (isset($data->sortName))
  $n = $data->sortName;
// echo $s . ' ' . $n;

if (isset($_POST['delete'])) {
  $arr = array();
  if (!empty($_POST['check'])) {
    foreach ($_POST['check'] as $check) {
      array_push($arr, $check);
    }
  }
  $data->delete($arr);
  header("Location: ./List");
  exit();
}
if (isset($_POST['deleteOne'])) {
  $arr = array();
  array_push($arr, $_POST['deleteOne']);
  $data->delete($arr);
  header("Location: ./List");
  exit();
}

if (isset($_POST['thead'])) {
  // echo $s . ' ' . $_POST['thead'];
  if ($_POST['thead'] == 'tid') {
    $data->keyword = null;
    $data->sort = ' order by CouponID asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tname') {
    $data->keyword = null;
    $data->sort = ' order by CouponName asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tcode') {
    $data->keyword = null;
    $data->sort = ' order by CouponCode asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tquantity') {
    $data->keyword = null;
    $data->sort = ' order by Quantity asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tprice') {
    $data->keyword = null;
    $data->sort = ' order by Price asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tpricecondition') {
    $data->keyword = null;
    $data->sort = ' order by PriceCondition asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tstartdate') {
    $data->keyword = null;
    $data->sort = ' order by StartDate asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'tenddate') {
    $data->keyword = null;
    $data->sort = ' order by EndDate asc';
    $coupons  = $data->getCouponList($data);
  } else if ($_POST['thead'] == 'texpenddate') {
    $data->keyword = null;
    $data->sort = ' order by ExpEndDate asc';
    $coupons  = $data->getCouponList($data);
  }
}

if (isset($_POST['key'])) {
  $data->keyword = $_POST['keywordbox'];
  $coupons  = $data->getCouponList($data);
}

require_once 'views/template/header.php';

?>

<style>
  .theadbtn {
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
  }
</style>


<div class="container-fluid">
  <div class="card">
    <div class="card-header" style="width:100%;">
      <form method="post" action="">
        <div class="col-md-offset-6 col-md-6">
          <label for='keywordbox'>關鍵字查詢&nbsp;&nbsp;<input type="textbox" name="keywordbox"></label><br>
          <button type="submit" class="btn btn-info btn-sm" name='key'>查詢</button>
        </div>
        <!-- 條件式 -->
        <div class="col-md-offset-6 col-md-6">
          <label for='keywordbox'>進階查詢&nbsp;&nbsp;<input type="textbox" name="keywordbox"></label>
          ***現在沒有功能
          <br>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <span>名稱&nbsp;<input type="checkbox"></span>
          <br>
          <button type="submit" class="btn btn-info btn-sm" name='key'>查詢</button>
        </div>

      </form>
    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post" action=''>
        <button type="submit" class="btn btn-danger btn-sm mb-2" name="delete">刪除</button>
        <table class="table table-bordered table-hover" style="width: auto; table-layout:fit-content; white-space: nowrap">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" id='selectallcheckbox' onclick="selectall();"></th>
              <th scope="col"><button class='theadbtn' name='thead' value="tid">編號&nbsp;<?php
                                                                                        if (isset($_POST['thead']) && $_POST['thead'] == 'tid') {
                                                                                          echo '<i class="fas fa-sort-down"></i>';
                                                                                        } else {
                                                                                          echo '<i class="fas fa-sort"></i>';
                                                                                        } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tname'>名稱&nbsp;<?php
                                                                                          if (isset($_POST['thead']) && $_POST['thead'] == 'tnamw') {
                                                                                            echo '<i class="fas fa-sort-down"></i>';
                                                                                          } else {
                                                                                            echo '<i class="fas fa-sort"></i>';
                                                                                          } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tcode'>折價券代碼&nbsp;<?php
                                                                                              if (isset($_POST['thead']) && $_POST['thead'] == 'tcode') {
                                                                                                echo '<i class="fas fa-sort-down"></i>';
                                                                                              } else {
                                                                                                echo '<i class="fas fa-sort"></i>';
                                                                                              } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='ttype'>類型&nbsp;<?php
                                                                                          if (isset($_POST['thead']) && $_POST['thead'] == 'ttype') {
                                                                                            echo '<i class="fas fa-sort-down"></i>';
                                                                                          } else {
                                                                                            echo '<i class="fas fa-sort"></i>';
                                                                                          } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tquantity'>數量&nbsp;<?php
                                                                                              if (isset($_POST['thead']) && $_POST['thead'] == 'tquantity') {
                                                                                                echo '<i class="fas fa-sort-down"></i>';
                                                                                              } else {
                                                                                                echo '<i class="fas fa-sort"></i>';
                                                                                              } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tprice'>折扣價錢/比例&nbsp;<?php
                                                                                                if (isset($_POST['thead']) && $_POST['thead'] == 'tprice') {
                                                                                                  echo '<i class="fas fa-sort-down"></i>';
                                                                                                } else {
                                                                                                  echo '<i class="fas fa-sort"></i>';
                                                                                                } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tpricecondition'>折扣條件(滿額)&nbsp;<?php
                                                                                                          if (isset($_POST['thead']) && $_POST['thead'] == 'tpricecondition') {
                                                                                                            echo '<i class="fas fa-sort-down"></i>';
                                                                                                          } else {
                                                                                                            echo '<i class="fas fa-sort"></i>';
                                                                                                          } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tstartdate'>開始領取/使用時間&nbsp;<?php
                                                                                                      if (isset($_POST['thead']) && $_POST['thead'] == 'tstartdate') {
                                                                                                        echo '<i class="fas fa-sort-down"></i>';
                                                                                                      } else {
                                                                                                        echo '<i class="fas fa-sort"></i>';
                                                                                                      } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tenddate'>領取截止日&nbsp;<?php
                                                                                                if (isset($_POST['thead']) && $_POST['thead'] == 'tenddate') {
                                                                                                  echo '<i class="fas fa-sort-down"></i>';
                                                                                                } else {
                                                                                                  echo '<i class="fas fa-sort"></i>';
                                                                                                } ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='texpenddate'>使用截止日&nbsp;<?php
                                                                                                    if (isset($_POST['thead']) && $_POST['thead'] == 'texpenddate') {
                                                                                                      echo '<i class="fas fa-sort-down"></i>';
                                                                                                    } else {
                                                                                                      echo '<i class="fas fa-sort"></i>';
                                                                                                    } ?></button></th>
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
                echo "<td>" . $coupon->Price . "元</td>";
              else
                echo "<td>" . floatval($coupon->Price) * 100 . "%" . "</td>";
              echo "<td>" . $coupon->PriceCondition . "</td>";
              echo "<td>" . $coupon->StartDate . "</td>";
              echo "<td>" . $coupon->EndDate . "</td>";
              echo "<td>" . $coupon->ExpEndDate . "</td>";
              echo "<td>" . '<a href=/RollinAdmin/Coupon/Detail/' . $coupon->CouponID . '> <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>' . "&nbsp;" . '</a>';
              echo '<button name="deleteOne" value="' . $coupon->CouponID . '" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </form>
    </div>
    <div class="card-footer">Footer</div>

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