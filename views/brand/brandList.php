<?php

$pageDir = "Brand";
$pageTitle = "Brand List";

$brands = $data->getAll();

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <table id="listTable" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Brand Logo</th>
        <th style="white-space: nowrap">Brand Name</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <?php
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
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>