<?php

$pageDir = "Product";
$pageTitle = "Product Detail";

$Product = $data->getDetail($data->id);
$Stocks = $data->getStock($Product->ProductID);

$Productsubtitle = "";
if($Product->Discontinued==1){
  $Productsubtitle = "(未上架)";
}
// 
if (isset($_POST['OFFsale'])) {
  $SaleSitu = $Product->Discontinued==1 ? 0 :1 ;
  $data->OFFsaleONE($Product->ProductID,$SaleSitu);
  header("Location: ./$Product->ProductID");
  exit();
}

require_once 'views/template/header.php';

?>

<style>
  th {
    color: #ffffff;
    background-color: #5289AE;
  }
  </style>

<div class="container-fluid">

<div class="col-md-12">
  <div class="card flex-md-row mb-4 box-shadow h-md-250">

    <div class="card-body d-flex flex-column" style="width:2200px;">
    
      <div class="d-flex">
        <div class="py-2 w-100 align-self-center">
          <h3 class="mb-0"><span class="text-dark"><?=$Product->ProductName.$Productsubtitle?></span></h3>
        </div>
        <div class="p-2 flex-shrink-1">NT$<h3><?=$Product->UnitPrice?></h3></div>
      </div>
      <p class="card-text mb-3 w-100"><?=$Product->PDescription?></p>
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
      if($Product->TotalStock==null){$Product->TotalStock = 0;}
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
                    $SizeName ="One Size" ;
                    if(isset($pdst->SizeName)){
                      $SizeName = "$pdst->SizeName";
                    }
                    $ColorName ="None Color" ;
                    if(isset($pdst->Color)){
                      $ColorName = "$pdst->Color";
                    }
                    echo  <<<here
                    <tr>
                    <td></td>
                    <td>$SizeName </td>
                    <td>$ColorName</td>
                    <td>$pdst->UnitInStock</td>
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

      <!--按鈕-->    <form name="form" method="post" action="">
      <div class="w-100 mt-5">       <!-- end -->
        <button type="button" class="btn btn-outline-dark " onclick="location.href='Product/List'">上一頁</button>
        <button type="submit" class="btn btn-danger" name="OFFsale" onclick="return confirm('是否確認修改販售狀態')">上/下架</button>
        <a class='btn btn-outline-primary float-right' href=/RollinAdmin/Product/Update/<?="$Product->ProductID>"?>修改</a>
      </div>
                </form>
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