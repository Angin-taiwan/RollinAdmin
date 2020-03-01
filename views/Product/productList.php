<?php

$pageDir = "Product";
$pageTitle = "Product List";

require_once 'views/template/header.php';

$products = $data->getAll();
?>

<!-- <div class="container-fluid">
  <?= $pageTitle ?> content here
</div> -->


<!-- /.container-fluid -->
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Product<br>ID</th>
            <th>ProductName</th>
            <th>Brand<br>ID</th>
            <th>Category<br>ID</th>
            <th>Description</th>
            <th>UnitPrice</th>
            <th>Last updated</th> <!-- Date -->
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $pd) {
            echo "<tr onclick=\"window.location='/RollinAdmin/Product/Detail/" . $pd->ProductID . "'\">";
            echo "<td> $pd->ProductID </td>";
            echo "<td>$pd->ProductName</td>";
            echo "<td>".$pd->BrandName."</td>";
            echo "<td>$pd->CategoryName</td>";
            echo "<td>" . substr($pd->PDescription,0,69) . "</td>";
            echo "<td>$pd->UnitPrice</td>";
            echo "<td>$pd->Date</td>";
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