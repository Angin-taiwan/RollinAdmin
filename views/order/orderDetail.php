<?php

// 對應 header template nav active
$pageDir = "Order";
$pageTitle = "Order Detail";

// breadcrumb 中文化
$pageDirTW = "訂單管理";
$pageTitleTW = "訂單細節";

# ----------------------------------------------------------
// get 物件
$order = $data->getOrderById($data->id);
$orderDetail = $data->getOrderDetail($data->id);

$display = is_null($order->CancelDate) ? "d-none" : "" ;
$odIndex = 1;
$totalPrice = 0;

$order_status = [
  '收到訂單' => $order->OrderDate,
  '理貨' => $order->CheckedDate,
  '出貨' => $order->ShippedDate,
  '已送達' => $order->DeliverDate
];

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>

.btn-print {
  position: absolute;
  right: 25px;
  top: 5px;
}

.cancelled {
  position: absolute;
  top: 80px;
  left: 240px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-weight: 700;
  font-size:2em;
  color: red;
  padding: 15px;
  z-index: 99;
  box-shadow:inset 0px 0px 0px 8px red;
  transform: rotate(-30deg);
}

#btn-back{
  position: absolute;
  top: -60px;
  left: 140px;
}

#progress-wrap {
  width: 800px;
}

a.bs-wizard-dot.yellow::after {
  background-color: #ffc107;
}

.bs-wizard-step {
  padding: 0;
  position: relative;
}

.bs-wizard-step .bs-wizard-stepnum {
  color: #595959;
  font-size: 16px;
  margin-bottom: 5px;
}

.bs-wizard-step .bs-wizard-info {
  color: #999;
  font-size: 12px;
}

.bs-wizard-step > .bs-wizard-dot {
  position: absolute;
  width: 30px;
  height: 30px;
  display: block;
  background: #abe0ed;
  top: 45px;
  left: 50%;
  margin-top: -15px;
  margin-left: -15px;
  border-radius: 50%;
}

.bs-wizard-step > .bs-wizard-dot:after {
  content: ' ';
  width: 14px;
  height: 14px;
  background: #46b7d5;
  border-radius: 50px;
  position: absolute;
  top: 8px;
  left: 8px;
}

.bs-wizard-step > .progress {
  position: relative;
  border-radius: 0px;
  height: 8px;
  box-shadow: none;
  margin: 20px 0;
}

.progress-bar {
  width: 0px;
  box-shadow: none;
  background: #abe0ed;
}

.bs-wizard-step.complete > .progress > .progress-bar {
  width: 100%;
}

.bs-wizard-step.disabled > .bs-wizard-dot {
  background-color: #e9ecef;
}

.bs-wizard-step.disabled > .bs-wizard-dot:after {
  opacity: 0;
}

.bs-wizard-step > .progress > .current {
  width: 50% !important;
}

</style>

<style media=print type="text/css">
  .noprint {
    visibility:hidden
  }
}

</style>

<div class="container-fluid">
  <div class="card position-relative">
    <a id="btn-back" class="btn btn-outline-dark float-left" href="Order/List">返回清單</a>
    <h5 class="card-header">訂單編號：<?= sprintf('%08d', $data->id); ?><span class="ml-3 <?= $display ?>">(已取消)</span></h5>
    <a href="javascript:window.print()" class="btn btn-outline-dark btn-print noprint" rel="external nofollow" target="_self">列印出貨單</a>
    <div class="cancelled <?= $display ?>">
      CANCELLED
    </div>
    <div class="card-body">
      <div id="progress-wrap my-auto">
        <div class="row">
        <?php
          foreach($order_status as $status => $date) {
            $complete = is_null($date) ? "disabled" : "complete";
            echo "<div class='col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 bs-wizard-step $complete'>";
            echo "<div class='text-center bs-wizard-stepnum'>$status</div>";
            echo "<div class='progress'>";
            echo "<div class='progress-bar'></div>";
            echo "</div>";
            echo "<a href='' class='bs-wizard-dot'></a>";
            echo "<div class='bs-wizard-info text-center'>$date</div>";
            echo "</div>";
          }
        ?>
        </div>
      </div>
      <hr>
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                商品明細
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body px-5">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">商品名稱</th>
                    <th class="text-right" scope="col">數量</th>
                    <th class="text-right" scope="col">單價</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($orderDetail as $od) {
                      echo "<tr>";
                      echo "<th scope='row'>$odIndex</th>";
                      echo "<td><a href='/RollinAdmin/Product/Detail/$od->ProductID'>$od->ProductName</a></td>";
                      echo "<td class='text-right'>$od->Quantity</td>";
                      echo "<td class='text-right'>$od->UnitPrice</td>";
                      echo "</tr>";
                      $odIndex++;
                      $totalPrice += $od->UnitPrice * $od->Quantity;
                    }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <td></td>
                  <td class="text-right"></td>
                  <td class="text-right"></td>
                  <td class="text-right">總價：<?= $totalPrice ?></td>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card -->
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo show">
                收件者資訊
              </button>
              <a class="btn btn-outline-dark float-right noprint" href="/RollinAdmin/User/Detail/<?=$order->UserID?>">訂購者資訊</a>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
            <div class="card-body px-5">
              <dl class="row">
                <dt class="col-sm-3">姓名</dt>
                <dd class="col-sm-9"><?= $order->RecipientName?></dd>
                <dt class="col-sm-3">電話</dt>
                <dd class="col-sm-9"><?= $order->RecipientPhone ?></dd>
                <dt class="col-sm-3">郵遞區號</dt>
                <dd class="col-sm-9"><?= $order->RecipientPostalCode ?></dd>
                <dt class="col-sm-3">行政區</dt>
                <dd class="col-sm-9"><?= $order->RecipientDistrict ?></dd>
                <dt class="col-sm-3">縣市</dt>
                <dd class="col-sm-9"><?= $order->RecipientCity ?></dd>
                <dt class="col-sm-3">地址</dt>
                <dd class="col-sm-9"><?= $order->RecipientAddress ?></dd>
              </dl>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.accordion -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>