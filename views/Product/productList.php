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
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $pd) {
            echo "<tr onclick=\"window.location='/RollinAdmin/Brand/Detail/" . $pd->ProductID . "'\">";
            echo "<td> $pd->ProductID </td>";
            echo "<td>$pd->ProductName</td>";
            echo "<td>$pd->Description</td>";
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