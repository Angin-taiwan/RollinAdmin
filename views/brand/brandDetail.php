<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand Detail";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "品牌細節";

# ----------------------------------------------------------
// get 物件
$brand = $data->get($data->id);

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
  .cover {
    width: 230px;
    height: 230px;
    object-fit: cover;
  }
  .brand-detail {
    min-height: 250px;
  }
</style>

<div class="container-fluid">

  <div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start brand-detail">
        <h3 class="mb-0">
          <span class="text-dark"><?=$brand->BrandName?></span>
        </h3>
        <p class="card-text my-3"><?=$brand->Description?></p>
        <div class="align-items-end w-100">
          <a class="btn btn-outline-dark" href="Brand/List">返回清單</a>
          <?="<a class='btn btn-outline-primary float-right' href=/RollinAdmin/Brand/Update/$brand->BrandID>修改</a>"?>
        </div>
      </div>
      <?= "<img class='card-img-right flex-auto img-fluid img-thumbnail mx-3 my-auto cover' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/>" ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>