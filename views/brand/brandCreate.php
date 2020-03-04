<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand Create";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "新增品牌";

# ----------------------------------------------------------

// new 物件
$brand = new Brand();

if (isset($_POST['submit'])) {
  // create brand
  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $data->create($brand);

  // file upload
  if(!isset($_FILES['file_upload']) || $_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "Error no file selected"; 
  } else {
    $file_upload_dir = "image/BrandImage/";
    $file_upload_name = $brand->BrandID;
    require_once './upload_single.php';
  }

  // 換到 detail 頁顯示
  if ($brand->BrandID) {
    header("Location: Detail/$brand->BrandID");
    exit();
  }
}

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
  .show-image {
    width: 230px;
    height: 230px;
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <form name="form" method="post" enctype="multipart/form-data" action="" >
        <div class="form-group">
          <label for="txtBrandName">品牌名稱</label><span class="font-weight-bold text-danger ml-1">*</span>
          <input type="text" name="BrandName" class="form-control" id="txtBrandName" placeholder="輸入品牌名稱" value="<?= $brand->BrandName ?>" required>
        </div>
        <div class="form-group">
          <label for="txtDescription">品牌描述</label>
          <textarea name="Description" class="form-control" id="txtDescription" rows="9" placeholder="輸入品牌描述"><?= $brand->Description ?></textarea>
        </div>
        <span>
          <a class="btn btn-outline-dark" href="Brand/List">返回清單</a>
          <button type="submit" name="submit" class="btn btn-primary float-right">確認新增</button>
        </span>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="file_upload">品牌圖片</label>
          <div class="border border-secondary p-3 mb-2 show-image">
            <?="<img id='show' class'w-100 h-100' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/>"?>
          </div>
          <div class="text-primary font-weight-bold">請選擇尺寸為 200x200</div>
          <div class="text-primary font-weight-bold">大小為 1MB 內 之 jpg 圖片</div>
          <input type="file" name="file_upload" id="file_upload" class="mt-2">
        </div>
      </form>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#show').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file_upload").change(function() {
    readURL(this);
  });
</script>