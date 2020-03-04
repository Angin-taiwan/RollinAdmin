<?php

$pageDir = "Product";
$pageTitle = "Product Detail";

$Product = $data->getDetail($data->id);
$Stocks = $data->getStock($Product->ProductID);

require_once 'views/template/header.php';

?>

<div class="container-fluid">

<div class="col-md-12">
  <div class="card flex-md-row mb-4 box-shadow h-md-250">

    <div class="card-body d-flex flex-column" style="width:2200px; height:300px;">
    
      <h3 class="mb-0">
        <span class="text-dark"><?=$Product->ProductName?></span>
      </h3>
      <p class="card-text my-3"><?=$Product->PDescription?></p>
      <!-- start -->
      <div class="d-flex align-items-start" >
      <table id="listTable" class="table table-bordered table-hover">
      <thead>
          <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Category</th>
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
                  
                  <td>$Product->BrandName</td>
                  <td>$Product->CategoryName</td>
                  <td>$Product->TotalStock</td>
                  <td>訂單量</td>
                  <td>$Product->UnitPrice</td>
                  <td>$Product->Date</td>
                  </tr>
                  here;
                  foreach ($Stocks as $pdst) {
                    echo  <<<here
                    <tr>
                    <td></td>
                    <td>Size:$pdst->SizeID </td>
                    <td>Color:$pdst->ColorID </td>
                    <td>pdst:$pdst->UnitInStock</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    here;
                  }
                  echo "";
      ?>
      </table>
      </div>

      <!--按鈕-->
      <div class="w-100 mt-5">       <!-- end -->
        <button type="button" class="btn btn-outline-dark" onclick="location.href='Product/List'">返回清單</button>
        <a class='btn btn-outline-primary float-right' href=/RollinAdmin/Product/Update/<?="$Product->ProductID>"?>修改</a>
      </div>
    </div> <!--/card-body-->

    <div class="card-body d-flex flex-column align-items-start">
    <img src="https://dummyimage.com/400x500/003853/dcdcdc">
    </div> <!--/card-body-->
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>