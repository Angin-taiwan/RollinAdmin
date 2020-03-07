<?php

// 對應 header template nav active
$pageDir = "Product";
$pageTitle = "Product Update";

// breadcrumb 中文化
$pageDirTW = "商品管理";
$pageTitleTW = "修改商品";
// get 物件
$Product = $data->getDetail($data->id);
$Stocks = $data->getStock($Product->ProductID);
# ----------------------------------------------------------

function updateProduct($Product) {
  return $this->updateDB(
    "UPDATE Product SET ProductName = ?,UnitPrice = ? , PDescription = ? WHERE ProductID = ? ;",
    ["$Product->ProductName", "$Product->UnitPrice", "$Product->PDescription", $Product->ProductID]
  );
}

if (isset($_POST['submit'])) {

  // 驗證必填欄位
  if (trim($_POST['ProductName']) == "" || trim($_POST['UnitPrice']) == ""  ) {
    echo "<script> alert('輸入錯誤，*欄位不可留白')</script>";
    // $brandinvalid = true;
    exit();
  }

  // update Product
  $Product->ProductName = $_POST['ProductName'];
  $Product->Description = $_POST['PDescription'];
  $Product->ProductID = $_POST['ProductID'];
  $Product->UnitPrice = $_POST['UnitPrice'];
  $data->updateProduct($Product);

  // file upload 尚未改寫!!!
  // if(!isset($_FILES['file_upload']) || $_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE) {
  //   echo "Error no file selected"; 
  // } else {
  //   $file_upload_dir = "image/BrandImage/";
  //   $file_upload_name = $brand->BrandID;
  //   require_once './upload_single.php';
  // }

  // 換到 detail 頁顯示
  if ($Product->ProductID) {
    header("Location: ../Detail/$Product->ProductID");
    exit();
  }
}

// 刪除功能 尚未改寫
// if (isset($_POST['delete'])) {
//   // delete brand
//   $Product->ProductID = $_POST['BrandID'];
//   $data->delete([$brand->BrandID]);

//   // delete brand image if exists
//   $target_dir = "image/BrandImage/";
//   $file_name = $brand->BrandID . '.jpg';
//   $target_file = $target_dir . $file_name;
//   if (file_exists($target_file)) { 
//     unlink($target_file);
//   }

//   // 換到 list 頁顯示
//   header("Location: ../List");
//   exit();
// }

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<div class="container-fluid">

<div class="col-md-12">
  <div class="card flex-md-row mb-4 box-shadow h-md-250">
    
    <div class="card-body d-flex flex-column" style="width:2200px;">
      <form name="form" method="post" enctype="multipart/form-data" action="">
          <div class="form-group input-group-lg">

          <div class="d-flex">
            <div class="pt-2 pb-0 w-75">
            <label for="txtProductName">商品名稱</label><span class="font-weight-bold text-danger ml-1">*</span>
              <input type="text" name="ProductName" class="form-control" id="txtProductName" placeholder="輸入商品名稱" value="<?=$Product->ProductName?>" required>
            
            </div>
            <div class="pt-2 pb-0 px-2 flex-shrink-1 ">
            <label for="txtUnitPrice">商品價格<span class="font-weight-bold text-danger ml-1">*</span></label>
              <input type="text" name="UnitPrice" class="form-control" id="txtUnitPrice" placeholder="輸入商品價格" value="<?=$Product->UnitPrice?>" required>
              
            </div>
          </div>
          </div>
          
        <div class="form-group">
          <label for="txtDescription">商品描述</label>
          <textarea name="PDescription" class="form-control" id="txtDescription" rows="9" placeholder="輸入商品描述"><?=$Product->PDescription?></textarea>
        </div>
        
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
      <?php #表頭
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
              #表身
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

<!-- 按鈕 -->
        <span>
          <a class="btn btn-outline-dark" href="Product/Detail/<?=$Product->ProductID?>">上一頁</a>
          <button type="button" class="btn btn-outline-dark" onclick="location.href='Product/List'">返回清單</button>
          <input type="hidden" name="ProductID" value="<?=$Product->ProductID?>">

          <div class="float-right">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
              刪除
            </button>
            <button type="submit" name="submit" class="btn btn-primary">儲存修改</button>
          </div>
        </span>
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