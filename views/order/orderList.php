<?php

$pageDir = "Order";
$pageTitle = "Order List";

$orders = $data->getAll();

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Orders</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>OrderID</th>
            <th>OrderDate</th>
            <th>UserID</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($orders as $order) {
            echo "<tr>";
            // echo "<td><img src=image/OrderLogo/" . str_replace(' ', '', $Order->OrderName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Order$order->OrderID>$order->OrderID</a></td>";
            echo "<td>$order->OrderDate</td>";
            echo "<td>$order->UserID</td>";
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