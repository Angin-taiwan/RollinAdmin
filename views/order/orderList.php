<style>
th{
  text-align: center;
}

form{
  font-size: 15px;
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


 
//更新出貨時間
if (isset($_GET['updateshippedDate'])) {
  $ss = $_GET['updateshippedDate'];
  $data->updateshipping($ss);
  echo "<script> alert('出貨成功'); </script>";
  }
//更新理貨時間
if (isset($_GET['updateCheckedDate'])) {
  $cc = $_GET['updateCheckedDate'];
  $data->updatechecked($cc);
  echo "<script> alert('理貨成功'); </script>";
  }
  //更新取消時間
if (isset($_GET['updateCancelDate'])) {
  $ccc = $_GET['updateCancelDate'];
  $data->updateCancel($ccc);
  echo "<script> alert('取消成功'); </script>";
  }

  //全部出貨按鈕
if (isset($_GET["checkedshippBtn"])) {
  $arr = array();
  foreach ($_GET['items'] as $check) {
    array_push($arr, $check);
  }
  $str = implode("','", $arr);
  $data->checkedupdateshipping($arr);
  echo "<script> alert('全部出貨成功'); </script>";
  // header("location: /RollinAdmin/order/List");
}
  //全部理貨按鈕
  if (isset($_GET["checkedBtn"])) {
    
    $arr = array();
    foreach ($_GET['items'] as $check) {
      array_push($arr, $check);
    }
    $str = implode("','", $arr);
    switch($_GET["checkedBtn"]){
      case 3:
        $data->checkedupdatecancel($arr);
        echo "<script> alert('勾選取消成功'); </script>";
        break;

      case 2:
      $data->checkedupdateshipping($arr);
      echo "<script> alert('勾選出貨成功'); </script>";
      break;

      case 1:
      $data->checkedupdatechecked($arr);
      echo "<script> alert('勾選理貨成功'); </script>";
      break;
    }
    
    // header("location: /RollinAdmin/order/List");
  }





  $www = '' ;
  $startDate = '';
  $endDate = '';

// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$OrderID = isset($query["OrderID"]) ? $query["OrderID"] : "";
$UserName = isset($query["UserName"])? $query["UserName"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$OrderDate = isset($query["OrderDate"]) ? $query["OrderDate"] : "";

$startDate = isset($_GET['startDate']) && $_GET['startDate'] != "" ? $_GET['startDate'] : "2020-01-01";
$endDate = isset($_GET['endDate']) && $_GET['endDate'] != "" ? $_GET['endDate'] : "2040-03-05";

echo $startDate, "<br>";
echo $endDate, "<br>"; 
echo $UserName;


// for pagination  
$pageStartIndex = ($pageNo - 1) * $pageSize;
$OrdersTotal = get_object_vars($data->getAllCount())["Total"];
$Orders = $UserName = "" ? $data->getAll($pageStartIndex, $pageSize) : $data->getAllLike($UserName, $startDate, $endDate, $pageStartIndex, $pageSize);
$OrdersCount = $OrderID == "" ? $OrdersTotal : get_object_vars($data->getAllLikeCount($OrderID))["Count"];
$pagesCount = ceil((int) $OrdersCount / (int) $pageSize);


require_once 'views/template/header.php';

?>





<div class="container-fluid">
  <div class="card">
    <div class="card-header pb-0">
      <form name="form" method="get" action="order/list">
        <div class="form-row ">
          <div class="col-10 ">
            <div class="form-group row">
              <label for="pageSize" class="col-1.5 col-form-label">每頁顯示筆數:</label>
              <div class="col-2">
                <select name="pageSize" class="form-control " onchange="this.form.submit()">
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
        <div class="d-flex justify-content-end" >
          <label for="example-date-input" class="col-xs-1.5 col-form-label">Date</label>
            <div class="col-5">
              <input class="form-control input-sm small-box" type="date" name="startDate" value="<?= $startDate ?>" id="example-date-input">
            </div>
            -
            <div class="col-5">
              <input class="form-control w-100 small-box" type="date" name="endDate" value="<?= $endDate ?>" id="example-date-input">
            </div>   
        </div>
         
        <div class= " d-flex justify-content-around">
          <div class="col-xs-5 ">
          <!-- onchange="this.form.submit() -->
            <input type="text" name="UserName" class="form-control float-right" 
            placeholder="輸入會員姓名搜尋" >
          </div>
          <div class="col-6">
            <label class="col-form-label">
              <?= "搜尋到：$OrdersCount 筆訂單" ?>
            </label>
            <input type="submit" class= "ml-0.5 btn btn-info btn-secondary" name="submitSearch" value="Search">
          </div>
          </div>
          <!-- <div class="col-2">
            <button type="submit" class="btn btn-primary float-right">確定</button>
          </div> -->
        </div>
        </form>
        <!-- /.form-row -->
      
  <form method="get" action="order/List">
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="mb-1 d-flex justify-content-between">
      <div>
      <input type="button" class="btn btn-outline-info btn-sm" id="checkedAllBtn" value="全選">
      <input type="button" class="btn btn-outline-info btn-sm" id="checkedNoBtn" value="全消">
      <button type="submit" class="btn btn-success btn-sm" id="checkedBtn" name="checkedBtn" value="1" onclick="return confirm">
      <i class='fa fa-box'>&nbsp</i>理貨</button></a>
      <button type="submit" class="btn btn-success btn-sm" id="checkedBtn" name="checkedBtn" value="2" onclick="return confirm">
      <i class='fa fa-truck'>&nbsp</i>出貨</button></a>
      <button type="submit" class="btn btn-danger btn-sm" id="checkedBtn" name="checkedBtn" value="3" onclick="return confirm">
      <i class='fa fa-ban'>&nbsp</i>取消</button></a>
      </div>
    
        
    <!-- <div class="float-right form-group">
      <input type="text" placeholder="search" name="keyword">
      <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
      <br>
    </div> -->
      </div>
    </div>
      <table id="listTable" class="table table-bordered table-hover table-sm">
        <thead>
          <tr class="text-center">
            <th></th>
            <th>ID</th>
            <!-- <th>UserID</th> -->
            <th>UserName</th>
            <th>Pamyment</th>
            <th>OrderDate</th>
            <th>CheckedDate</th>
            <th>ShippedDate</th>
            <th>DeliverDate</th>
            <th>CancelDate</th>
            <th>FinalPrice</th>

          </tr>
        </thead>
        <tbody>
        
          <?php
           $displayS=" ";
           $displayC=" ";
           $displayD=" ";
           $displayCancel=" ";
          
          foreach ($Orders as $order) {
            if (isset($order->ShippedDate)){
              $displayS = "style='display:none;'";
            }else{
              $displayS = "style='display;'";
            };
            if (isset($order->CheckedDate)){
              $displayC = "style='display:none;'";
            }else{
              $displayC = "style='display;'";
            };
            if (isset($order->DeliverDate)){
              $displayD = "style='display:none;'";
            };
            if (isset($order->CancelDate)){
              $displayCancel = "style='display:none;'";
            }else{
              $displayCancel = "style='display;'";
            };
            echo "<tr class='text-center'>";
            echo "<td>
            <input type='checkbox' id='check' name='items[]' value='" . $order->OrderID . "'>
            </td>";
            // echo "<td><img src=image/OrderLogo/" . str_replace(' ', '', $Order->OrderName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Order/Detail/$order->OrderID>$order->OrderID</a></td>";
            // echo "<td>$order->UserID</td>";
            echo "<td>$order->UserName</td>";
            echo "<td>$order->PaymentName</td>";
            echo "<td>$order->OrderDate</td>";
            echo "<td>$order->CheckedDate
                  <button class='btn btn-sm btn-success' $displayC
                  type='submit' name='updateCheckedDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-box'>&nbsp</i>理貨</button></a>
                  </td>";
            echo "<td>$order->ShippedDate
                  <button class='btn btn-sm btn-success' $displayS
                  type='submit' name='updateshippedDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-truck'>&nbsp</i>出貨</button></a>
                  </td>";
            echo "<td>$order->DeliverDate</td>";
                  
            echo "<td>$order->CancelDate
                  <button class='btn btn-sm btn-danger' $displayCancel
                  type='submit' name='updateCancelDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-ban'>&nbsp</i>取消</button></a></td>";
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

//display 
  function TestBlack(TagName){
 var obj = document.getElementsByName(TagName);
 for(var item in obj){
    if(obj[item].style.display==""){
    obj[item].style.display = "none";
    }else{
    obj[item].style.display = ""; 
    }
 };
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