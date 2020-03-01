<?php

$pageDir = "Order";
$pageTitle = "Order List";

$Orders = $data->getAll();

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
            <th>UserID</th>
            <th>UserID</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($Orders as $Order) {
            echo "<tr>";
            // echo "<td><img src=image/OrderLogo/" . str_replace(' ', '', $Order->OrderName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Order$Order->OrderID>$Order->OrderName</a></td>";
            echo "<td>$Order->$UserID</td>";
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