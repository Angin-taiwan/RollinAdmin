<?php

// 對應 header template nav active
$pageDir = "Brand";
$pageTitle = "Brand List";

// breadcrumb 中文化
$pageDirTW = "品牌管理";
$pageTitleTW = "品牌清單";

# ----------------------------------------------------------

// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$brandName = isset($query["brandName"]) ? $query["brandName"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;

// for pagination
$pageStartIndex = ($pageNo - 1) * $pageSize;
$brandsTotal = get_object_vars($data->getAllCount())["Total"];
$brands = $brandName == "" ? $data->getAll($pageStartIndex, $pageSize) : $data->getAllLike($brandName, $pageStartIndex, $pageSize);
$brandsCount = $brandName == "" ? $brandsTotal : get_object_vars($data->getAllLikeCount($brandName))["Count"];
$pagesCount = ceil((int) $brandsCount / (int) $pageSize);

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
.list-image {
  width: 150px;
  height: 150px;
}
</style>

<div class="container-fluid">
  <div class="card">
    <div class="card-header pb-0">
      <form name="form" method="get" action="">
        <div class="form-row">
          <div class="col-3">
            <div class="form-group row">
              <label for="pageSize" class="col-6 col-form-label">每頁顯示筆數</label>
              <div class="col-6">
                <select name="pageSize" class="form-control" onchange="this.form.submit()">
                  <option value="3" <?= ($pageSize == "3") ? "selected=selected" : ""; ?>>3</option>
                  <option value="6" <?= ($pageSize == "6") ? "selected=selected" : ""; ?>>6</option>
                  <option value="20" <?= ($pageSize == "20") ? "selected=selected" : ""; ?>>20</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-3">
            <label class="col-form-label">
              <?= "總共有：$brandsTotal 個品牌" ?>
            </label>
          </div>
          <div class="col-3">
            <input type="text" name="brandName" class="form-control float-right" placeholder="輸入品牌名稱搜尋" value="<?= $brandName ?>" onchange="this.form.submit()">
          </div>
          <div class="col-3">
            <label class="col-form-label">
              <?= "搜尋到：$brandsCount 個品牌" ?>
            </label>
          </div>
        </div>
        <!-- /.form-row -->
      </form>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>品牌圖片</th>
            <th style="white-space: nowrap">品牌名稱</th>
            <th>品牌描述</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td width='170px'><img class='list-image' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/></td>";
            echo "<td><a href='/RollinAdmin/Brand/Detail/$brand->BrandID'>$brand->BrandName</a></td>";
            echo "<td>$brand->Description</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <tfoot>
          <?php
          if ($pagesCount > 1) {
            $queryString = "?";
            if ($pageSize != "") {
              $queryString .= "pageSize=" . $pageSize;
            };
            if ($brandName != "") {
              $queryString .= "&brandName=$brandName";
            };
            $prevous = $pageNo - 1;
            $next = $pageNo + 1;
            $prevousDisabled = $prevous <= 0 ? "disabled" : "";
            $nextDisabled = $next > $pagesCount ? "disabled" : "";
            echo "<nav aria-label='Page navigation'>";
            echo "<ul class='pagination'>";
            echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./Brand/List/$queryString&pageNo=$prevous'>上一頁</a></li>";
            for ($i = 1; $i <= $pagesCount; $i++) {
              $active = ($pageNo == $i) ? "active" : "";
              echo "<li class='page-item $active'><a class='page-link' href='./Brand/List/$queryString&pageNo=$i'>$i</a></li>";
            }
            echo "<li class='page-item $nextDisabled'><a class='page-link' href='./Brand/List/$queryString&pageNo=$next'>下一頁</a></li>";
            echo "</ul>";
            echo "</nav>";
          }
          ?>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>