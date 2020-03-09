<?php

$pageDir = "Coupon";
$pageTitle = "Coupon List";

// breadcrumb 中文化
$pageDirTW = "折價券管理";
$pageTitleTW = "折價券清單";

$coupons  = $data->getCouponList($data);
$page = 1;
$pagesize = 10;

if (isset($_POST['page'])) {
  $page = $_POST['page'];
}

if (isset($_POST['pagesize'])) {
  $pagesize = $_POST['pagesize'];
  $data->pagesize = $_POST['pagesize'];
  $data->page = 1;
} else if (isset($_POST['lastpage'])) {
  $pagesize = $_POST['lastpage'];
}


if (isset($_POST['key'])) {
  $data->keyword = $_POST['keywordbox'];
  $coupons  = $data->getCouponList($data);
  $pagesize = count($coupons);
  $key = $_POST['keywordbox'];
} else if (isset($_POST['keyword'])) {
  $data->keyword = $_POST['keyword'];
  $coupons  = $data->getCouponList($data);
  // $pagesize = count($coupons);
  $key = $_POST['keyword'];
}

$pagenum = count($coupons);
$showpageLB = ($page - 1) * $pagesize + 1;
$showpageUB = $page * $pagesize;

// echo $page . ' ' . $pagesize . ' ' . $showpageLB . ' ' . $showpageUB . ' ' . $pagenum . ' ' . $data->keyword;

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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
      } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
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
} else if (isset($_POST['lastorder'])) {
  if ($_POST['lastorder'] == 'tid') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by CouponID desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by CouponID asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tname') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by CouponName desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by CouponName asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tcode') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by CouponCode desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by CouponCode asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'ttype') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by CouponTypeName desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by CouponTypeName asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tquantity') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by Quantity desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by Quantity asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tprice') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by Price desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by Price asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tpricecondition') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by PriceCondition desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by PirceCondition asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tstartdate') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by StartDate desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by StartDate asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'tenddate') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by EndDate desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by EndDate asc';
      $coupons  = $data->getCouponList($data);
    }
  } else if ($_POST['lastorder'] == 'texpenddate') {
    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd') {
      $data->sort = ' order by ExpEndDate desc';
      $coupons  = $data->getCouponList($data);
    } else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a') {
      $data->sort = ' order by ExpEndDate asc';
      $coupons  = $data->getCouponList($data);
    }
  }
}


if (isset($_SERVER['QUERY_STRING']) && strrpos($_SERVER['QUERY_STRING'], 'page') != false) {
  $p = $_SERVER['QUERY_STRING'];
  $page = '';
  $n = stripos($_SERVER['QUERY_STRING'], 'page');
  for ($i = $n + 5; $i <= strlen($p); $i++) {
    if ($p[$i] == '&') break;
    $page = $page . $p[$i];
  }
  if (strrpos($_SERVER['QUERY_STRING'], 'pagesize') != false) {
    $p = $_SERVER['QUERY_STRING'];
    $n = stripos($_SERVER['QUERY_STRING'], 'pagesize');
    $pagesize = '';
    for ($i = $n + 9; $i < strlen($p); $i++) {
      // echo 'i' . $p[$i];
      if ($p[$i] == '&') break;
      $pagesize = $pagesize . $p[$i];
    }
  } else
    $pagesize = count($coupons);


  if (!isset($_POST['key']) && strrpos($_SERVER['QUERY_STRING'], 'kw') != false) {
    $p = $_SERVER['QUERY_STRING'];
    $n = stripos($_SERVER['QUERY_STRING'], 'kw');
    // $pagesize = '';
    $key = '';
    for ($i = $n + 3; $i < strlen($p); $i++) {
      if ($p[$i] == '&') break;
      $key = $key . $p[$i];
    }
    $data->keyword = $key;
    $coupons  = $data->getCouponList($data);
  }
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

  select {
    border: 1px solid #d2d2d2;
    padding: 3px;
    /* text-align:center; */
  }

  th {
    color: #ffffff;
    background-color: #5289AE;
  }
</style>
<?php

?>


<div class="container-fluid">
  <div class="card">
    <div class="card-header" style="width:100%;">
      <form name="form" method="post" action="">
        <!-- 每頁顯示頁數 -->
        <div class="form-row">
          <div class="col-3">
            <div class="form-group row">
              <label for="pagesize" class="col-6 col-form-label">每頁顯示筆數</label>
              <div class="col-6">
                <select name="pagesize" class="form-control" onchange="this.form.submit()">
                  <?php
                  $max = 0;
                  for ($i = 10; $i <= $pagenum; $i = $i + 10) {
                    echo '<option value="' . $i . '"';
                    if ($pagesize == $i)
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
            </div>
          </div>
          <div class="col-2">
            <label class="col-form-label">
              <?= "總共有：$pagenum 個折價券" ?>
            </label>
          </div>
        </div>
        <!-- keyword -->
        <div class="form-row">
          <div class="form-group col-12 form-inline">
            <label for='keywordbox'>關鍵字查詢</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="textbox" name="keywordbox" class="form-control col-6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-primary btn-sm" name='key' type="submit">查詢</button>
          </div>
        </div>
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

        <input type="hidden" name="lastpage" value=<?= $pagesize ?>>
      </form>
      <!-- button to coupontype and usercoupon -->
      <div class="form-group float-right">
        <a href='/RollinAdmin/Coupon/TypeDetail'><button class="btn btn-primary btn-sm">折價券類型</button></a>
        <a href='/RollinAdmin/Coupon/User/all'><button class="btn btn-primary btn-sm">折價券領取/使用狀況</button></a>
      </div>
    </div>
    <div class="card-body" style="overflow:auto;">
      <form method="post" action=''>
        <!-- page -->
        <div class='row'>
          <nav aria-label="Page navigation" class="m-auto">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php
              for ($i = 1; $i <= ceil($pagenum / $pagesize); $i++) {
                if ($i == $page)
                  echo '<li class="page-item active"><span class="page-link">' . $i . '<span class="sr-only">(current)</span></span></li>';
                else
                  echo '<li class="page-item"><span class="page-link"><input type="submit" name="page" value="' . $i . '" style="border:none;background-color:white;"></span></li>';
              }
              ?>
              <li class="page-item">
                <a class="page-link" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!-- delete -->
        <button type="submit" class="btn btn-danger btn-sm mb-2" name="delete">刪除</button>
        <!-- table -->
        <table class="table table-bordered table-hover" style="width: auto; table-layout:fit-content; white-space: nowrap">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" id='selectallcheckbox' onclick="selectall();"></th>
              <th scope="col"><button class='theadbtn' name='thead' value="tid">編號&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tid' && isset($_POST['thead']) && $_POST['thead'] == 'tid') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tid' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tid') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tname'>名稱&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tname' && isset($_POST['thead']) && $_POST['thead'] == 'tname') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tname' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tname') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tcode'>折價券代碼&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tcode' && isset($_POST['thead']) && $_POST['thead'] == 'tcode') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tcode' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tcode') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='ttype'>類型&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'ttype' && isset($_POST['thead']) && $_POST['thead'] == 'ttype') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'ttype' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'ttype') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tquantity'>數量&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tquantity' && isset($_POST['thead']) && $_POST['thead'] == 'tquantity') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tquantity' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tquantity') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tprice'>折扣價錢/比例&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tprice' && isset($_POST['thead']) && $_POST['thead'] == 'tprice') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tprice' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tprice') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tpricecondition'>折扣條件(滿額)
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tpricecondition' && isset($_POST['thead']) && $_POST['thead'] == 'tpricecondition') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tpricecondition' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tpricecondition') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tstartdate'>開始領取/使用時間&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tstartdate' && isset($_POST['thead']) && $_POST['thead'] == 'tstartdate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tstartdate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tstartdate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='tenddate'>領取截止日&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'tenddate' && isset($_POST['thead']) && $_POST['thead'] == 'tenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'tenddate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'tenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
                    echo '<i class="fas fa-sort"></i>';
                  ?></button></th>
              <th scope="col"><button class='theadbtn' name='thead' value='texpenddate'>使用截止日&nbsp;
                  <?php
                  if (isset($_POST['lastorder']) && $_POST['lastorder'] == 'texpenddate' && isset($_POST['thead']) && $_POST['thead'] == 'texpenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                    else
                      echo '<i class="fas fa-sort"></i>';
                  } else if (isset($_POST['thead']) && $_POST['thead'] == 'texpenddate' && isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                    echo '<i class="fas fa-sort-down"></i>';
                  else if (!isset($_POST['thead']) && isset($_POST['lastorder']) && $_POST['lastorder'] == 'texpenddate') {
                    if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'd')
                      echo '<i class="fas fa-sort-up"></i>';
                    else if (isset($_POST['ordertype']) && $_POST['ordertype'] == 'a')
                      echo '<i class="fas fa-sort-down"></i>';
                  } else
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
              echo "<td>" . '<a href=/RollinAdmin/Coupon/Detail/' . $coupon->CouponID . '> <button type="button" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>' . "&nbsp;" . '</a>';
              echo '<button name="deleteOne" value="' . $coupon->CouponID . '" onclick="return deletealert();" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>' . "</td>";
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
                                                    else if (isset($_POST['lastorder']))
                                                      echo '"' . $_POST['lastorder'] . '"';
                                                    else
                                                      echo '""'; ?>>
        <input type="hidden" name="lastpage" value=<?= $pagesize ?>>
        <div class='row'>
          <nav aria-label="Page navigation" class="m-auto">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php
              for ($i = 1; $i <= ceil($pagenum / $pagesize); $i++) {
                if ($i == $page)
                  echo '<li class="page-item active"><span class="page-link">' . $i . '<span class="sr-only">(current)</span></span></li>';
                else
                  echo '<li class="page-item"><span class="page-link"><input type="submit" name="page" value="' . $i . '" style="border:none;background-color:white;"></span></li>';
              }
              ?>
              <li class="page-item">
                <a class="page-link" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </form>

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

    function deletealert() {
      return confirm('是否確定刪除?\n註:擁有此券的使用者資料會一同刪除')
    }
  </script>

  <?php

  require_once 'views/template/footer.php';

  ?>