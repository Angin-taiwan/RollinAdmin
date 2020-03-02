<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand Create";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "新增品牌";

$brand = new Brand();

if (isset($_POST['submit'])) {
  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $data->create($brand);
  if ($brand->BrandID) {
    header("Location: Detail/$brand->BrandID");
    exit();
  }
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <form name="form" method="post" action="" >
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
      </form>
    </div>
    <div class="col-md-4">
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>