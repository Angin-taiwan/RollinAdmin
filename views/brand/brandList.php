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
$brandName =  isset($query["brandName"]) ? $query["brandName"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;

$array_colomns = [
  "BrandID" => "品牌圖片",
  "BrandName" => "品牌名稱",
  "Description" => "品牌描述",               
];

$columns = array_keys($array_colomns);
$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
$sort = isset($_GET['sort']) && strtolower($_GET['sort']) == 'desc' ? 'DESC' : 'ASC';

$hidInputs = array( 
  'column' => $column, 
  'sort' => $sort
); 

$array_pageSize = array(
  3, 6, 20
);

// for sorting
$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort); 
$asc_or_desc = $sort == 'ASC' ? 'desc' : 'asc';

// for pagination
$pageStartIndex = ($pageNo - 1) * $pageSize;
$brandsTotal = get_object_vars($data->getAllCount())["Total"];
$brandsCount = $brandName == "" ? $brandsTotal : get_object_vars($data->getAllLikeCount($brandName))["Count"];
$pagesCount = ceil((int) $brandsCount / (int) $pageSize);

// read data
$brands = $data->getAllLike($brandName, $column, $sort, $pageStartIndex, $pageSize);

# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<style>
th>a {
  text-decoration:none;
  color:#000;
}
.td-w {
  width: 170px;
}
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
                  <?php
                  foreach ($array_pageSize as $thisSize) {
                    $selected = $pageSize == $thisSize ? "selected" : "";
                    echo "<option value='$thisSize' $selected >$thisSize</option>";
                  }
                  ?>
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
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>
            <?php
            foreach($array_colomns as $col => $colTW) {
              $queryString = "pageSize=$pageSize&brandName=$brandName&column=$col&sort=$asc_or_desc&pageNo=$pageNo";
              $sortClass =$column == $col ? "-" . $up_or_down : "";
              echo "<th>";
              echo "<a href='/RollinAdmin/Brand/List?$queryString'>$colTW<i class='fas fa-sort$sortClass'></i></a>";
              echo "</th>";
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($brands as $brand) {
            echo "<tr>";
            echo "<td class='td-w'><img class='list-image' src='image/BrandImage/$brand->BrandID.jpg' title='$brand->BrandName' alt='$brand->BrandName 目前沒有圖片'/></td>";
            echo "<td class='td-w'><a href='/RollinAdmin/Brand/Detail/$brand->BrandID'>$brand->BrandName</a></td>";
            echo "<td>$brand->Description</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
        <tfoot>
          <?php
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
            
            echo "<nav aria-label='Page navigation' class='sticky-top'>";
            echo "<ul class='pagination'>";
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