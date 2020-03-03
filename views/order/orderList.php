<?php

$pageDir = "Order";
$pageTitle = "Order List";

$orders = $data->getAll();
// $Users = $data->getUserById($id);
// $Users = $data->getAll();

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Orders</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th>ID</th>
            <!-- <th>UserID</th> -->
            <th>UserName</th>
            <th>Product</th>
            <th>Pamyment</th>
            <th>OrderDate</th>
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
          foreach ($orders as $order) {
            echo "<tr>";
            // echo "<td><img src=image/OrderLogo/" . str_replace(' ', '', $Order->OrderName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Brand/Detail/$order->OrderID</a></td>";
            // echo "<td>$order->UserID</td>";
            echo "<td>$order->UserName</td>";
            echo "<td>$order->ProductName</td>";
            echo "<td>$order->PaymentName</a> </td>";
            echo "<td>$order->OrderDate</td>";
            echo "<td>$order->ShippedDate</td>";
            echo "<td>$order->DeliverDate</td>";
            echo "<td>$order->CancelDate</td>";
            echo "<td>$order->MarketingID</td>";
            echo "<td>$order->CouponID</td>";
            echo "<td>$order->FinalPrice</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>