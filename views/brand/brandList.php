<?php

$pageDir = "Brand";
$pageTitle = "Brand List";

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Brands</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>BrandLogo</th>
            <th>BrandName</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $brands = $data->getAll();
          foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td><img src=image/BrandLogo/" . str_replace(' ', '', $brand->BrandName) . ".jpg /></td>";
            echo "<td><a href=/RollinAdmin/Brand/Detail/$brand->BrandID>$brand->BrandName</a></td>";
            echo "<td>$brand->Description</td>";
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