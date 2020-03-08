<style>
th{
  /* text-align: center; */
  color: #ffffff;
  background-color: #5289AE;
  height:30px ;
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
  $Date = date("Y-m-d");
  $Date60 = date('Y-m-d', strtotime($Date.' - 60 days'));


//for nav
$activeall= '';
$activeunc= '';
$activeuns= '';
$activeuncan= '';
// $haha= 1 ;
// $Nav = array(" ",'and shippedDate is null');
// $Navtype= $Nav[$haha];
// echo $Navtype, "<br>";

// switch($_GET['Navbarha']){
//   case 1:
//     $Navtype = '';
//     $activeall= 'active';
//     break;

//   case 2:
//     $Navtype = 'checkedDate is not null';
//     $activeunc= 'active';
//     break;

//   case 3:
//     $Navtype = 'shippedDate is not null';
//     $activeuns= 'active';
//     break;

//   case 4:
//     $Navtype = 'CancelDate is not null';
//     $activeuncan= 'active';
//     break;
// }



// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
// $Nav =  $query["Navbarha"] : "";

$Searchtext = isset($query["Searchtext"])? $query["Searchtext"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$OrderDate = isset($query["OrderDate"]) ? $query["OrderDate"] : "";
$keywords = isset($query["keywords"]) ? $query["keywords"] : "";
$ordertype = isset($query["ordertype"]) ? $query["ordertype"] : "";


$startDate = isset($_GET['startDate']) && $_GET['startDate'] != "" ? $_GET['startDate'] : $Date60;
$endDate = isset($_GET['endDate']) && $_GET['endDate'] != "" ? $_GET['endDate'] : $Date ;

echo $startDate, "<br>";
echo $endDate, "<br>";
echo  $keywords, "<br>";
echo  $Searchtext, "<br>";
// echo $ordertype, "<br>" ;



// for pagination  
$pageStartIndex = ($pageNo - 1) * $pageSize;
$OrdersTotal = get_object_vars($data->getAllCount())["Total"];
$Orders = $Searchtext  == "" && $ordertype == "" ? $data->getAll($pageStartIndex, $pageSize) : $data->getAllLike($ordertype, $keywords, $Searchtext, $startDate, $endDate, $pageStartIndex, $pageSize);
$OrdersCount = $Searchtext == "" ? $OrdersTotal : get_object_vars($data->getAllLikeCount($keywords,$Searchtext, $startDate, $endDate))["Count"];
$pagesCount = ceil((int) $OrdersCount / (int) $pageSize);




require_once 'views/template/header.php';

?>





<div class="container-fluid">
  <div class="card">
    <div class="card-header pb-0">
      <form name="form" method="get" action="order/list">

      <!-- Nav  -->
      <!-- <ul class="nav nav-tabs">
        <li class="nav-item" >
          <a type= "submit" name= "Navbar" value= "1" class= " btn nav-link active"  id="Nav"  onclick="return confirm" >全部</a>
        </li>
        <li class="nav-item">
          <a type= "submit" class="btn nav-link " name= "Navbar"  id="Nav" value= "2" onclick="return confirm">未理貨</a>
        </li>
        <li class="nav-item" >
          <a type= "submit" class="btn nav-link " name= "Navbar"  id="Nav" value= "3" onclick="return confirm">未出貨</a>
        </li>
        <li class="nav-item">
          <a type= "submit" class=" btn nav-link " name= "Navbar"  id="Nav" value= "4" onclick="return confirm">已取消</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">尚未付款</a>
        </li>
      </ul> -->
      <!-- Nav end  -->
        <div class="form-group d-flex align-items-center col-12">
          <label for="pageSize" class=" col-form-label ">每頁顯示筆數:&nbsp&nbsp&nbsp</label>

          <select name="pageSize" class="col-sm-1 form-control " onchange="this.form.submit()">
            <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>&nbsp3</option>
            <option value="6" <?= ($pageSize == "6") ? "selected=selected" : ""; ?>>&nbsp6</option>
            <option value="20" <?= ($pageSize == "20") ? "selected=selected" : ""; ?>>&nbsp20</option>
          </select>

          <div class="p-2 flex-grow-1 mr-3">
            <label class="col-form-label">
            <?= "總共有：$OrdersTotal 筆訂單" ?>
            </label>
          </div>

          <div class="mt-4 d-flex justify-content-end ml-3" >
          <label for="example-date-input" class="col-xs-1.5 col-form-label">Date</label>
          <div class="col-5">
            <input class="form-control input-sm small-box" type="date" name="startDate" value="<?= $startDate ?>" id="example-date-input">
          </div>
          <label for="example-date-input" class="col-xs-1.5 col-form-label">-</label>
          <div class="col-5">
            <input class="form-control w-100 small-box" type="date" name="endDate" value="<?= $endDate ?>" id="example-date-input">
          </div>   
        </div>
        </div>

        <div class= "form-group d-flex align-items-center col-12 pl-0 ">
          <div class = "col-6 pl-0 mr-5">
            <div type=submit  class="btn-group btn-group-toggle col-8  ml-0" data-toggle="buttons">
              <label onclick="return confirm" class="btn btn-outline-info <?= $ordertype == "" ? active : ""   ?>">
                <input onclick="return confirm" type="radio" name="ordertype" id="option1" value="" > 全部訂單
              </label>
              <label onclick="return confirm" class="btn btn-outline-info <?= $ordertype == "CheckedDate is null" ? active : ""   ?>">
                <input type="radio" name="ordertype" id="option2" value= "CheckedDate is null"> 未理貨
              </label>
              <label onclick="return confirm" class="btn btn-outline-info <?= $ordertype == "shippeddate is null" ? active  : ""   ?>">
                <input type="radio" name="ordertype" id="option3" value="shippeddate is null" > 未出貨
              </label>
              <label onclick="return confirm" class="btn btn-outline-info <?= $ordertype == "canceldate is not null" ? active  : ""   ?>" >
                <input type="radio" name="ordertype" id="option4" value="canceldate is not null"> 已取消
              </label>
            </div>
          </div>

          <select name="keywords" class="form-control col-sm-1 ml-5">
            <option value="O.orderID" <?= ($keywords == "O.orderID") ? "selected=selected" : ""; ?>>編號</option>
            <option value="UserName" <?= ($keywords == "UserName") ? "selected=selected" : ""; ?>>姓名</option>
          </select>
      
          <div class="col-3 ml-2">
          <!-- onchange="this.form.submit() -->
            <input type="text" name="Searchtext" class="form-control float-right " value = "<?= isset($_GET["Searchtext"]) ? $_GET["Searchtext"] : ""; ?>"
            placeholder="輸入關鍵字搜尋" >
          </div>
          <input type="submit" class= "ml-2 btn btn-info btn-secondary" name="submitSearch" value="Search">     
        </div>
        <div class="col-12 d-flex flex-row-reverse">
            <label class="col-form-label ml-4">
              <?= "搜尋到：$OrdersCount 筆訂單" ?>
            </label>
        </div>
      </div>
    </form>
        <!-- /.form-row -->
      
    <form method="get" action="order/List">
    
    <!-- /.card-header -->
    <div class="card-body">
    
      <div class="mb-1 d-flex  flex-row ">
        <input type="button" class="btn btn-outline-info btn-sm mr-1 " id="checkedAllBtn" value="全選">
        <input type="button" class="btn btn-outline-info btn-sm mr-1" id="checkedNoBtn" value="全消">
        <button type="submit" class="btn btn-primary btn-sm mr-1" id="checkedBtn" name="checkedBtn" value="1" onclick="return confirm">
        <i class='fa fa-box'>&nbsp</i>理貨</button></a>
        <button type="submit" class="btn btn-primary btn-sm mr-1" id="checkedBtn" name="checkedBtn" value="2" onclick="return confirm">
        <i class='fa fa-truck'>&nbsp</i>出貨</button></a>
        <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#CancelModal">
        <i class='fa fa-ban'>&nbsp</i>取消</button></a>
      </div>  
      <div id="CancelModal" class="modal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"></div>
                        <div class="modal-body">
                            <p class="ml-3 mt-2">確定要取消這幾筆訂單？</p>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="Order/List" >返回</a>
                            <button type="submit" name="checkedBtn" class="btn btn-danger" value="3">確定刪除</button>
                        </div>
                    </div>
                </div>
            </div>
      
      <br>
      <?php //下方分頁按鈕
        if($pagesCount>1){
          $queries = array(
            'pageSize' => $pageSize,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startDate' => $startDate,
            'keyword' => $keywords,
            'Searchtext' => $Searchtext,
          );

          $queryString = http_build_query($queries,'','&');

          $prePage =  $pageNo - 1;
          $nextPage = $pageNo + 1;
          $preDisabled = $prePage < 1 ? "disabled" : "";
          $nextDisabled = $nextPage > $pagesCount ? "disabled" : "";
          
          echo "<br>";
          echo "<ul class='pagination d-flex justify-content-center'>";
          echo "<li class='page-item $preDisabled'><a href='Order/List?$queryString&pageNo=$prePage' class='page-link'>上一頁</a></li>";
          for($i=1 ; $i<= $pagesCount ; $i++){
              $active = $pageNo == $i ? "active" : "";
            echo "<li class='page-item $active'><a href='Order/List?$queryString&pageNo=$i' class='page-link'> $i </a></li>";
          };
          echo "<li class='page-item $nextDisabled'><a href='Order/List?$queryString&pageNo=$nextPage' class='page-link'>下一頁</a></li>";
          echo "</ul>";
        };
      ?>

      <?php
      $TypedisplayC = '';
      $TypedisplayS = '';
      $TypedisplayCancel = '';

      switch($ordertype){
              case "CheckedDate is null":
                $TypedisplayC = "";
                $TypedisplayS = "class='d-none'";
                $TypedisplayCancel = "class='d-none'";
              break;
              case "shippeddate is null":
                $TypedisplayC = "class='d-none'";
                $TypedisplayS = "";
                $TypedisplayCancel = "class='d-none'";
              break;
              case "canceldate is not null":
                $TypedisplayC = "class='d-none'";
                $TypedisplayS = "class='d-none'";
                $TypedisplayCancel = "";
              break;
            };
      

      
      echo "<table id='listTable' class='table table-bordered table-hover table-sm'>";
      echo "<thead>";
      echo "<tr class='text-center'>";
      echo "<th></th>";
      echo "<th>ID</th>";
      
      echo "<th>UserName</th>";
      echo "<th>Pamyment</th>";
      echo "<th>OrderDate</th>";
      echo "<th $TypedisplayC>CheckedDate</th>";
      echo "<th $TypedisplayS>ShippedDate</th>";
      echo "<th>DeliverDate</th>";
      echo "<th $TypedisplayCancel>CancelDate</th>";
      echo "<th>FinalPrice</th>";

      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
        
       
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
            echo "<td $TypedisplayC>$order->CheckedDate
                  <button class='btn btn-sm btn-primary' $displayC
                  type='submit' name='updateCheckedDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-box'>&nbsp</i>理貨</button></a>
                  </td>";
            echo "<td $TypedisplayS>$order->ShippedDate
                  <button class='btn btn-sm btn-primary' $displayS
                  type='submit' name='updateshippedDate' value= '".$order->OrderID."' > 
                  <i class='fa fa-truck'>&nbsp</i>出貨</button></a>
                  </td>";
            echo "<td>$order->DeliverDate</td>";
                  
            echo "<td $TypedisplayCancel>$order->CancelDate
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
      <?php //下方分頁按鈕
        if($pagesCount>1){
          $queries = array(
            'pageSize' => $pageSize,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startDate' => $startDate,
            'keyword' => $keywords,
            'Searchtext' => $Searchtext,
          );

          $queryString = http_build_query($queries,'','&');

          $prePage =  $pageNo - 1;
          $nextPage = $pageNo + 1;
          $preDisabled = $prePage < 1 ? "disabled" : "";
          $nextDisabled = $nextPage > $pagesCount ? "disabled" : "";
          
          echo "<br>";
          echo "<ul class='pagination d-flex justify-content-center'>";
          echo "<li class='page-item $preDisabled'><a href='Order/List?$queryString&pageNo=$prePage' class='page-link'>上一頁</a></li>";
          for($i=1 ; $i<= $pagesCount ; $i++){
              $active = $pageNo == $i ? "active" : "";
            echo "<li class='page-item $active'><a href='Order/List?$queryString&pageNo=$i' class='page-link'> $i </a></li>";
          };
          echo "<li class='page-item $nextDisabled'><a href='Order/List?$queryString&pageNo=$nextPage' class='page-link'>下一頁</a></li>";
          echo "</ul>";
        };
      ?>
        </tfoot>
        </div>
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