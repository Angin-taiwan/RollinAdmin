<style>
th{
  text-align: center;
}

</style>


<?php

// 對應 header template nav active
$pageDir = "Order";
$pageTitle = "Order List";
// breadcrumb 中文化
$pageDirTW = "訂單管理";
$pageTitleTW = "訂單清單";

$datecreate= date("Y-m-d h:i:sa");


$search = 1 ; 
//更新出貨時間
if (isset($_POST['updateshippedDate'])) {
  $qqq = $_POST['updateshippedDate'];
  $data->updateshipping($qqq);
  // header("Location: /RollinAdmin/Order/list/");
  echo "<script> alert('修改成功'); </script>";
  }

// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$OrderID = isset($query["OrderID"]) ? $query["OrderID"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;

// for pagination  
$pageStartIndex = ($pageNo - 1) * $pageSize;
$OrdersTotal = get_object_vars($data->getAllCount())["Total"];
$Orders = $OrderID == "" ? $data->getAll($pageStartIndex, $pageSize) : $data->getAllLike($OrderID, $pageStartIndex, $pageSize);
$OrdersCount = $OrderID == "" ? $OrdersTotal : get_object_vars($data->getAllLikeCount($OrderID))["Count"];
$pagesCount = ceil((int) $OrdersCount / (int) $pageSize);


require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header pb-0">
      <form name="form" method="get" action="">
        <div class="form-row">
          <div class="col-3">
            <div class="form-group row">
              <label for="pageSize" class="col-6 col-form-label ml-3">每頁顯示筆數:</label>
              <div class="col-5  pl-2">
                <select name="pageSize" class="form-control" onchange="this.form.submit()">
                  <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>3</option>
                  <option value="6" <?= ($pageSize == "6") ? "selected=selected" : ""; ?>>6</option>
                  <option value="20" <?= ($pageSize == "20") ? "selected=selected" : ""; ?>>20</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label class="col-form-label">
              <?= "總共有：$OrdersTotal 筆訂單" ?>
            </label>
          </div>
          <div class="col-3">
            <div class="form-group row">      
              <div class="col-7  ">
                <select name="searchtype" class="form-control" onchange="this.form.submit()">
                  <option value="orderid" <?= ($search == "O.OrderID") ? "selected=selected" : ""; ?>>訂單編號</option>
                  <option value="username" <?= ($search == "U.UserName") ? "selected=selected" : ""; ?>>會員姓名</option>
                  <option value="paymentname" <?= ($search == "PaymentName") ? "selected=selected" : ""; ?>>付款方式</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-2 ">
            <input type="text" name="OrderID" class="form-control float-right" placeholder="輸入會員姓名搜尋" value="<?= $OrderID ?>" onchange="this.form.submit()">
          </div>
          <div class="col-2">
            <label class="col-form-label">
              <?= "搜尋到：$OrdersCount 筆訂單" ?>
            </label>
          </div>
          <div class="col-2">
            <!-- <button type="submit" class="btn btn-primary float-right">確定</button> -->
          </div>
        </div>
        <!-- /.form-row -->
      </form>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class="mb-3">
    <input type="button" class="btn btn-info" id="checkedAllBtn" value="全選">
    <input type="button" class="btn btn-outline-info" id="checkedNoBtn" value="全消">
    <input type="submit" class="btn btn-success " id="checkedshippBtn" name="checkedshippBtn" value="出貨">
    <div class="form-group row">
      <label for="example-date-input" class="col-2 col-form-label">Date</label>
      <div class="col-5">
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      </div>
      -
      <div class="col-5">
        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
      </div>
</div>
    <!-- <div class="float-right form-group">
      <input type="text" placeholder="search" name="keyword">
      <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
      <br>
    </div> -->
    </div>
    <form method="post" action="order/List">
      <table id="listTable" class="table table-bordered table-hover table-sm">
        <thead>
          <tr class="text-align-center">
            <th></th>
            <th>ID</th>
            <!-- <th>UserID</th> -->
            <th>UserName</th>
            <th>Product</th>
            <th>Pamyment</th>
            <th>OrderDate</th>
            <th style="width: 10%">shipped?</th>
            <th>ShippedDate</th>
            <th>DeliverDate</th>
            <th>CancelDate</th>
            <th>MarketingID</th>
            <th>CouponID</th>
            <th>FinalPrice</th>

          </tr>
        </thead>
        <tbody>
        
          <?php
          foreach ($Orders as $order) {
            echo "<tr>";
            echo "<td>
            <input type='checkbox' id='check' name='items[]' value='" . $order->OrderID . "'>
            </td>";
            // echo "<td><img src=image/OrderLogo/" . str_replace(' ', '', $Order->OrderName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Order/Detail/$order->OrderID>$order->OrderID</a></td>";
            // echo "<td>$order->UserID</td>";
            echo "<td>$order->UserName</td>";
            echo "<td>$order->ProductName</td>";
            echo "<td>$order->PaymentName</a> </td>";
            echo "<td>$order->OrderDate</td>";
            echo "<td>
                  <button class='btn btn-sm btn-success' 
                  type='submit' name='updateshippedDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-truck'>&nbsp</i>出貨</button></a>
                  </td>";
            echo "<td>$order->ShippedDate</td>";
            echo "<td>$order->DeliverDate</td>";
            echo "<td>$order->CancelDate</td>";
            echo "<td>$order->MarketingID</td>";
            echo "<td>$order->CouponID</td>";
            echo "<td>$order->FinalPrice</td>";
            // echo $Orders->UnitPrice * $Orders->Quantity + $Orders->ShippingPrice;
            // echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
      </form>
      <tfoot>
          <nav aria-label="Page navigation">
            <ul class="pagination mt-4">
              <?php
              if ($pagesCount > 1) {
                $queryString = "?";
                if ($pageSize != "") {
                  $queryString .= "pageSize=" . $pageSize;
                };
                if ($OrderID != "") {
                  $queryString .= "&b=$OrderID";
                };
                $prevous = $pageNo - 1;
                $next = $pageNo + 1;
                $prevousDisabled = $prevous <= 0 ? "disabled" : "";
                $nextDisabled = $next > $pagesCount ? "disabled" : "";
                echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./Order /List/$queryString&pageNo=$prevous'>上一頁</a></li>";
                for ($i = 1; $i <= $pagesCount; $i++) {
                  echo "<li class='page-item'><a class='page-link' href='./Order  /List/$queryString&pageNo=$i'>$i</a></li>";
                }
                echo "<li class='page-item $nextDisabled'><a class='page-link' href='./Order  /List/$queryString&pageNo=$next'>下一頁</a></li>";
              }
              ?>
            </ul>
          </nav>
        </tfoot>
    </div>
    <!-- /.card-body -->
  </div>
  
  <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
  let items = document.getElementsByName("items[]");

  let checkedAllBtn = document.getElementById("checkedAllBtn");
  checkedAllBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = true;
    }
  }

  let checkedNoBtn = document.getElementById("checkedNoBtn");
  checkedNoBtn.onclick = function() {
    for (let i = 0; i < items.length; i++) {
      items[i].checked = false;
    }
  }

  // let checkedRevBtn = document.getElementById("checkedRevBtn");
  // checkedRevBtn.onclick = function() {
  //   for (let i = 0; i < items.length; i++) {
  //     if (items[i].checked) {
  //       items[i].checked = false;
  //     } else {
  //       items[i].checked = true;
  //     }
  //   }
  // }
</script>