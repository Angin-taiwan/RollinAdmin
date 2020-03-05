<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand Update";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "修改品牌";

# ----------------------------------------------------------

// get 物件
$brand = $data->get($data->id);

if (isset($_POST['submit'])) {

  // 驗證必填欄位
  if (trim($_POST['BrandName']) == "") {
    $brandinvalid = true;
    exit();
  }

  // update brand
  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $_POST['BrandID'];
  $data->update($brand);

  // file upload
  if (!isset($_FILES['file_upload']) || $_FILES['file_upload']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "Error no file selected";
  } else {
    $file_upload_dir = "image/BrandImage/";
    $file_upload_name = $brand->BrandID;
    require_once './upload_single.php';
  }

  // 換到 detail 頁顯示
  if ($brand->BrandID) {
    header("Location: ../Detail/$brand->BrandID");
    exit();
  }
}

if (isset($_POST['delete'])) {
  // delete brand
  $brand->BrandID = $_POST['BrandID'];
  $data->delete([$brand->BrandID]);

  // delete brand image if exists
  $target_dir = "image/BrandImage/";
  $file_name = $brand->BrandID . '.jpg';
  $target_file = $target_dir . $file_name;
  if (file_exists($target_file)) {
    unlink($target_file);
  }

  // 換到 list 頁顯示
  header("Location: ../List");
  exit();
}

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
  .show-image {
    border: 1px solid #D0D0D0;
    background-color: #fff;
    width: 234px;
    height: 234px;
  }
</style>

<div class="container-fluid">
  <form name="form" method="post" enctype="multipart/form-data" action="">
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label for="txtBrandName">品牌名稱</label><span class="font-weight-bold text-danger ml-1">*</span>
          <input type="text" name="BrandName" class="form-control" id="txtBrandName" placeholder="輸入品牌名稱" value="<?=$brand->BrandName?>" required>
        </div>
        <div class="form-group">
          <label for="txtDescription">品牌描述</label>
          <textarea name="Description" class="form-control" id="txtDescription" rows="9" placeholder="輸入品牌描述"><?=$brand->Description?></textarea>
        </div>
        <div class="mb-3">
          <a class="btn btn-outline-dark" href="Brand/List">返回清單</a>
          <a class="btn btn-outline-dark" href="Brand/Detail/<?=$brand->BrandID?>">返回細節</a>
          <input type="hidden" name="BrandID" value="<?=$brand->BrandID?>">
          <div class="float-right">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
              刪除
            </button>
            <button type="submit" name="submit" class="btn btn-primary">儲存修改</button>
          </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">確定要刪除品牌「<?=$brand->BrandName?>」?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                警告：刪除後將無法復原，請再度確認是否要刪除。
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" name="delete" class="btn btn-danger">確認刪除</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">不要刪除</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.The Modal -->
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="file_upload">品牌圖片</label>
          <div class="rounded-lg p-3 mb-2 show-image">
            <?="<img id='show' class'w-100 h-100' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/>"?>
          </div>
          <div class="text-primary font-weight-bold">請選擇尺寸為 200x200</div>
          <div class="text-primary font-weight-bold">大小為 1MB 內之 jpg 圖片</div>
          <input type="file" name="file_upload" id="file_upload" class="mt-2">
          </div>
        </div>
      </div>
    </div>
  <!-- /.row -->
  </form>
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
    } else {
      $('#show').attr('src', "");
    }
  };

  $("#file_upload").change(function() {
    readURL(this);
  });
</script>