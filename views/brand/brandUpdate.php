<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand Update";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "修改品牌";

$brand = $data->get($data->id);

if (isset($_POST['submit'])) {

  if(trim($_POST['BrandName']) == ""){
    $brandinvalid = true;
    exit();
  }

  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $_POST['BrandID'];
  $data->update($brand);
  if ($brand->BrandID) {
    header("Location: ../Detail/$brand->BrandID");
    exit();
  }
}

if (isset($_POST['delete'])) {
  $brand->BrandID = $_POST['BrandID'];
  $data->delete([$brand->BrandID]);
  header("Location: ../List");
  exit();
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="col-md-8">
    <form name="form" method="post" action="">
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
        <a class="btn btn-outline-dark" href="Brand/Detail/<?= $brand->BrandID ?>">返回細節</a>
        <input type="hidden" name="BrandID" value="<?= $brand->BrandID ?>">

        <div class="float-right">
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
            刪除
          </button>
          <button type="submit" name="submit" class="btn btn-primary">儲存修改</button>
        </div>
      </span>
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">確定要刪除品牌「<?=$brand->BrandName ?>」?</h4>
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
    </form>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>