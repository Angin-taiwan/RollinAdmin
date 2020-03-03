<?php

$pageDir = "Product";
$pageTitle = "Product Detail";

$Product = $data->getDetail($data->id);

require_once 'views/template/header.php';

?>
<div class="container-fluid">

<div class="col-md-12">
  <div class="card flex-md-row mb-4 box-shadow h-md-250">
    <div class="card-body d-flex flex-column align-items-start" style="width:2200px; height:300px;">
      <h3 class="mb-0">
        <span class="text-dark"><?=$Product->ProductName?></span>
      </h3>
      <p class="card-text my-3"><?=$Product->PDescription?></p>
      <table id="listTable" class="table table-bordered table-hover">
      <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Description</th>
            <th>總庫存</th>
            <th>訂單量</th>
            <th>單價</th>
            <th>更新日期</th> <!-- Date -->
          </tr>
        </thead>
      <?php
                  echo <<<here
                  <tr>
                  <td style='width:2%'> $Product->ProductID </td>
                  <td style='width:15%'><a href=/RollinAdmin/Product/Detail/$Product->ProductID>$Product->ProductName</a></td>
                  <td>$Product->BrandID</td>
                  <td>$Product->CategoryID</td>
                  <td>001</td>
                  <td>003</td>
                  <td>002</td>
                  <td>$Product->UnitPrice</td>
                  <td>$Product->Date</td>
                  </tr>
                  here;
      ?>
      </table>
      <!--按鈕-->
      <div class="align-items-end w-100"> 
        <a class="btn btn-outline-dark" href="Product/List">返回清單</a>
        <?="<a class='btn btn-outline-primary float-right' href=/RollinAdmin/Product/Update/$Product->ProductID>修改</a>"?>
      </div>
    </div>
    <img src="https://dummyimage.com/400x500/003853/dcdcdc">
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>