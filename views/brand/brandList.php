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

// set variables
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$brandName = isset($query["brandName"]) ? $query["brandName"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;
$show = isset($query["show"]) ? $query["show"] : "l";

// set table columns
$array_columns = [
  "BrandID" => "品牌圖片",
  "BrandName" => "品牌名稱",
  "Description" => "品牌描述",
];

// get column, sort
$columns = array_keys($array_columns);
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort = isset($_GET['sort']) && strtolower($_GET['sort']) == 'desc' ? 'DESC' : 'ASC';

// set hidden inputs
$hidInputs = [
  'column' => $column,
  'sort' => $sort,
  'show' => $show
];

// set page size select potions
$array_pageSize = [3, 6, 20];

// for sorting
$up_or_down = str_replace(['ASC','DESC'], ['up','down'], $sort);
$asc_or_desc = $sort == 'ASC' ? 'desc' : 'asc';

// for view
$viewQuery = "Brand/List?pageSize=$pageSize&brandName=$brandName&column=$column&sort=$sort&pageNo=$pageNo";

// for pagination
$pageStartIndex = ($pageNo - 1) * $pageSize;
$brandsTotal = get_object_vars($data->getAllCount())["Total"];
$brandsCount = $brandName == "" ? $brandsTotal : get_object_vars($data->getAllLikeCount($brandName))["Count"];
$pagesCount = ceil((int) $brandsCount / (int) $pageSize);

// read data
$brands = $data->getAllLike($brandName, $column, $sort, $pageStartIndex, $pageSize);

function createPagination($pagesCount, $pageNo, $query) {
  if ($pagesCount > 1) {
    $pageQuery = $query;
    unset($pageQuery['url']);

    $prevousNo = $pageNo - 1;
    $pageQuery['pageNo'] = $prevousNo;
    $prevousQueryString = http_build_query($pageQuery, '', '&');
    $prevousDisabled = $prevousNo <= 0 ? "disabled" : "";

    $nextNo =  $pageNo + 1;
    $pageQuery['pageNo'] = $nextNo;
    $nextQueryString = http_build_query($pageQuery, '', '&');
    $nextDisabled = $nextNo > $pagesCount ? "disabled" : "";

    echo "<nav aria-label='Page navigation'>";
    echo "<ul class='pagination justify-content-center'>";
    echo "<li class='page-item $prevousDisabled'><a class='page-link' href='./Brand/List?$prevousQueryString'>上一頁</a></li>";

    for ($i = 1; $i <= $pagesCount; $i++) {
      $pageQuery['pageNo'] = $i;
      $queryString = http_build_query($pageQuery, '', '&');
      $active = ($pageNo == $i) ? "active" : "";
      echo "<li class='page-item $active'><a class='page-link' href='./Brand/List?$queryString'>$i</a></li>";
    }

    echo "<li class='page-item $nextDisabled'><a class='page-link' href='./Brand/List?$nextQueryString'>下一頁</a></li>";
    echo "</ul>";
    echo "</nav>";
  }
}
# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
th {
  background-color: #5289AE;
}
th>a {
  text-decoration:none;
  color:#fff;
}
th>a:hover {
  color:#fff;
}
.td-w {
  width: 170px;
}
.list-image {
  width: 150px;
  height: 150px;
}
.list-brandname {
  font-size: 1.1em;
}
.grid-img-wrap {
  width: 150px;
  height: 150px;
  margin: 1px;
}
.grid-img {
  width: 100%;
  height: 100%;
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
                  <?php
                  foreach ($array_pageSize as $thisSize) {
                    $selected = $pageSize == $thisSize ? "selected" : "";
                    echo "<option value='$thisSize' $selected>$thisSize</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-2">
            <label class="col-form-label">
              <?= "總共有：$brandsTotal 個品牌" ?>
            </label>
          </div>
          <div class="col-2">
            <input type="text" name="brandName" class="form-control float-right" placeholder="輸入品牌名稱搜尋" value="<?= $brandName ?>" onchange="this.form.submit()">
          </div>
          <div class="col-2">
            <label class="col-form-label">
              <?= "搜尋到：$brandsCount 個品牌" ?>
            </label>
          </div>
          <div class="col-3">
            <ul class="nav nav-pills float-right">
              <li class="nav-item">
                <a class="nav-link <?= $show == 'l' ? 'active':'' ?>" href="<?= $viewQuery ?>&show=l"><i class="fas fa-list"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= $show == 'g' ? 'active':'' ?>" href="<?= $viewQuery ?>&show=g"><i class="fas fa-th"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <?php
          foreach ($hidInputs as $k => $v) {
            echo "<input type='hidden' name='$k' value='$v'>";
          }
        ?>
      </form>
      <!-- /.form-row -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php createPagination($pagesCount, $pageNo, $query); ?>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show <?= $show == 'l' ? 'active':'' ?>" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
          <table id="listTable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <?php
                foreach($array_columns as $col => $colTW) {
                  $queryString = "pageSize=$pageSize&brandName=$brandName&column=$col&sort=$asc_or_desc&pageNo=$pageNo&show=l";
                  $sortClass =$column == $col ? "-" . $up_or_down : "";
                  echo "<th>";
                  echo "<a href='/RollinAdmin/Brand/List?$queryString'>$colTW <i class='fas fa-sort$sortClass'></i></a>";
                  echo "</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($brands as $brand) {
                echo "<tr>";
                echo "<td class='td-w'><a href='/RollinAdmin/Brand/Detail/$brand->BrandID'><img class='list-image' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/></a></td>";
                echo "<td class='td-w'><a href='/RollinAdmin/Brand/Detail/$brand->BrandID' class='list-brandname'>$brand->BrandName</a></td>";
                echo "<td>$brand->Description</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade show mb-4 <?= $show == 'g' ? 'active':'' ?>" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
          <div class="row">
            <?php
              foreach($brands as $brand) {
                echo "<div class='grid-img-wrap m-1'>";
                echo "<a href='/RollinAdmin/Brand/Detail/$brand->BrandID'><img class='grid-img' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/></a>";
                echo "</div>";
              }
            ?>
          </div>
        </div>
      </div>
      <!-- tab-content -->
      <div>
        <?php createPagination($pagesCount, $pageNo, $query); ?>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>