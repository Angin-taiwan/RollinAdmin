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
    width: 220px;
    height: auto;
    object-fit: cover;
  }
  .brand-desc {
    min-height: 150px;
  }
</style>

<div class="container-fluid">

  <div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column">
        <h3 class="mb-0">
          <span class="text-dark"><?=$brand->BrandName?></span>
        </h3>
        <div class="brand-desc">
          <p class="card-text my-3"><?=$brand->Description?></p>
        </div>
        <div class="bottom">
          <a class="btn btn-outline-dark float-left" href="Brand/List">返回清單</a>
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