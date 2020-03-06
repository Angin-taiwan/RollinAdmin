<?php

$pageDir = "Coupon";
$pageTitle = "Coupon List";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券清單";

$coupons  = $data->getCouponList($data);
$page = 1;
$showpageLB = 1;
$showpageUB = count($coupons);

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
  $data->keyword = $_POST['keyword'];
  if ($_POST['thead'] == 'tid') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by CouponID desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by CouponID asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by CouponID asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tname') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by CouponName desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by CouponName asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by CouponName asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tcode') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by CouponCode desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by CouponCode asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by CouponCode asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'ttype') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by CouponTypeName desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by CouponTypeName asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by CouponTypeName asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tquantity') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by Quantity desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by Quantity asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by Quantity asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tprice') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by Price desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by Price asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by Price asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tpricecondition') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by PriceCondition desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by PriceCondition asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by PriceCondition asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tstartdate') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by StartDate desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by StartDate asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by StartDate asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'tenddate') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by EndDate desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by EndDate asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by EndDate asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['thead'] == 'texpenddate') {
    if (isset($_POST['lastorder']) && $_POST['lastorder'] == $_POST['thead']) {
      if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
        $_POST['ordertype'] = 'd';
        $data->sort = ' order by ExpEndDate desc';
        $coupons  = $data->getCouponList($data);
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
        $_POST['ordertype'] = '';
        $_POST['lastorder'] = '';
        $data->sort = null;
        $coupons  = $data->getCouponList($data);
      } else {
        $_POST['ordertype'] = 'a';
        $data->sort = ' order by ExpEndDate asc';
        $coupons  = $data->getCouponList($data);
      }
    } else {
      $_POST['ordertype'] = 'a';
      $data->sort = ' order by ExpEndDate asc';
      $coupons  = $data->getCouponList($data);
    }
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
<?php
$pagenum = count($coupons);
if (isset($_POST['page']))
  $showpageUB = $_POST['page'];
?>
<!-- <?php var_dump($coupons); ?> -->
<!-- <?= $_POST['lastorder'] . ' ' . $_POST['ordertype'] . ' ' . $_POST['lastorder']; ?> -->
<div class="container-fluid">
  <div class="card">
    <div class="card-header" style="width:100%;">

      <form method="post" action="">
        <div class="row mt-2">
          <div class="col-12" style="text-align:center;">
            <label for='keywordbox'>關鍵字查詢&nbsp;&nbsp;</label>
            <input type="textbox" name="keywordbox">
            &nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-sm" name='key'>查詢</button>
          </div>
          <!-- 條件式 -->
          <div class="col-12 mt-2" style="text-align:center; ">
            <label for='keywordbox'>進階查詢&nbsp;&nbsp;</label>
            <select>
              <option></option>
            </select>
            <input type="textbox" name="Advancedkeywordbox">
            &nbsp;&nbsp;
            <button type="submit" class="btn btn-primary btn-sm" name='Advancedkey'>查詢</button>
          </div>
        </div>
      </form>
      <div class="float-right">
        <a href='/RollinAdmin/Coupon/TypeDetail'><button class="btn btn-primary btn-sm mt-2">折價券類型</button></a>
        &nbsp;&nbsp;
        <a href='/RollinAdmin/Coupon/User/all'><button class="btn btn-primary btn-sm mt-2">折價券領取/使用狀況</button></a>
      </div>
    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post" action=''>
        <button type="submit" class="btn btn-danger btn-sm mb-2" name="delete">刪除</button>
        <div style="float:right; overflow:auto">
          <label for name="pagen">每頁顯示筆數</label>
          <select name="page" onchange="this.form.submit()">
            <?php
            $max = 0;
            for ($i = 10; $i <= $pagenum; $i = $i + 10) {
              echo '<option value="' . $i . '"';
              if ($showpageUB <= $i && $showpageUB > $i - 10)
                echo ' selected';
              echo '>' . $i . '</option>';
              $max = $i;
            }
            if ($max != $pagenum) {
              echo '<option value="' . $pagenum . '"';
              if ($showpageUB == $pagenum)
                echo ' selected';
              echo ' >' . $pagenum . '</option>';
            }
            ?>
          </select>
        </div>
        <table class="table table-bordered table-hover" style="width: auto; table-layout:fit-content; white-space: nowrap">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" id='selectallcheckbox' onclick="selectall();"></th>
              <th scope="col"><button class='theadbtn' name='thead' value="tid">編號&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tid' && $_POST['thead'] == 'tid') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tid' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tname'>名稱&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tname' && $_POST['thead'] == 'tname') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tname' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tcode'>折價券代碼&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tcode' && $_POST['thead'] == 'tcode') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tcode' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='ttype'>類型&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'ttype' && $_POST['thead'] == 'ttype') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'ttype' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tquantity'>數量&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tquantity' && $_POST['thead'] == 'tquantity') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tquantity' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tprice'>折扣價錢/比例&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tprice' && $_POST['thead'] == 'tprice') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tprice' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tpricecondition'>折扣條件(滿額)
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tpricecondition' && $_POST['thead'] == 'tpricecondition') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tpricecondition' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tstartdate'>開始領取/使用時間&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tstartdate' && $_POST['thead'] == 'tstartdate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tstartdate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tenddate'>領取截止日&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tenddate' && $_POST['thead'] == 'tenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tenddate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='texpenddate'>使用截止日&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'texpenddate' && $_POST['thead'] == 'texpenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'texpenddate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col">管理</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $num = 0;
            foreach ($coupons as $coupon) {
              $num++;
              if ($num < $showpageLB || $num > $showpageUB)
                continue;
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
        <input type="hidden" name="keyword" value=<?= '"' . $data->keyword . '"' ?>>
        <input type="hidden" name="ordertype" value=<?php
                                                    if (isset($_POST['ordertype']))
                                                      echo '"' . $_POST['ordertype'] . '"';
                                                    else
                                                      echo '""';
                                                    ?>>
        <input type="hidden" name="lastorder" value=<?php
                                                    if (isset($_POST['thead']))
                                                      echo '"' . $_POST['thead'] . '"';
                                                    else
                                                      echo '""'; ?>>
      </form>
      <div class='row'>
        <nav aria-label="Page navigation" class="m-auto">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php
            for ($i = 1; $i <= $pagenum / ($showpageUB - $showpageLB + 1); $i++) {
              if ($i == $page)
                echo '<li class="page-item active"><span class="page-link">' . $i . '<span class="sr-only">(current)</span></span></li>';
              else
                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
            }
            if ($pagenum % ($showpageUB - $showpageLB + 1) > 0)
              echo '<li class="page-item"><a class="page-link" href="#">' . (intval($pagenum / ($showpageUB - $showpageLB + 1)) + 1) . '</a></li>';
            ?>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="card-footer"></div>

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
  </script>

  <?php

  require_once 'views/template/footer.php';

  ?>