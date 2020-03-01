<?php

$pageDir = "Order";
$pageTitle = "Order List";

$orders = $data->getAll();

require_once 'views/template/header.php';

?>

<div class="container-fluid">
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Order</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>OrderID</th>
            <th>UserID</th>
            <th>PaymentID</th>
            <!-- <th>ShippingID</th>
            <th>OrderDate</th>
            <th>ShippedDate</th>
            <th>DeliverDate</th>
            <th>CancelDate</th>
            <th>MarketingID </th>
            <th>CouponID</th>
            <th>Finalprice</th> -->
          </tr>
        </thead>
        <tbody>
        <?php
          foreach ($Order as $Orders) {
            echo "<tr>";
            echo "<td>$Order->OrderID</td>";
            echo "<td>$Order->UserID</td>";
            echo "<td>$Order->PaymentID</td>";
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

