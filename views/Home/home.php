<?php
// 對應 header template nav active
$pageDir = "";
$pageTitle = "Home";

# ----------------------------------------------------------

$allCounts = get_object_vars($data->getAllCount()[0]);

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
  :root {
    --home-image-size: 180px;
  }
  .home-card-wrap {
    width: var(--home-image-size);
    margin-left: 10px;
    margin-right: 10px;
  }
  .hom-images-wrap {
    overflow: hidden;
    width: var(--home-image-size);
    height: var(--home-image-size);
  }
  .home-images {
    width: var(--home-image-size);
    height: var(--home-image-size);
    object-fit: cover;
  }
  .count {
    /* display:none; */
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <div class="home-images-wrap">
          <img src="image/Home/News.jpg" class="home-images" alt="">
        </div>
        <div class="card-body">
          <p class="card-text">消息管理<span class="count float-right"><?=$allCounts['NewsCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="News/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="News/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Course.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">課程管理<span class="count float-right"><?=$allCounts['CourseCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Course/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="Course/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/User.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">會員管理<span class="count float-right"><?=$allCounts['UserCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="User/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="User/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Product.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">商品管理<span class="count float-right"><?=$allCounts['ProductCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Product/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="Product/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Order.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">訂單管理<span class="count float-right"><?=$allCounts['OrderCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Order/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <!-- <a href="Order/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Coupon.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">折價券管理<span class="count float-right"><?=$allCounts['CouponCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Coupon/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="Coupon/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Marketing.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">行銷管理<span class="count float-right"><?=$allCounts['MarketingCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Marketing/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="Marketing/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Brand.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">品牌管理<span class="count float-right"><?=$allCounts['BrandCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Brand/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <a href="Brand/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="home-card-wrap">
      <div class="card mb-4 shadow-sm">
        <img src="image/Home/Category.jpg" class="home-images" alt="">
        <div class="card-body">
          <p class="card-text">類別管理<span class="count float-right"><?=$allCounts['CategoryCount']?>:<?=$allCounts['SubCategoryCount']?></span></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a href="Category/List" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">清單</a>
              <!-- <a href="Category/Create" class="btn btn-sm btn-outline-secondary" role="button" aria-pressed="true">新增</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>