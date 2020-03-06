<?php

$pageDir = "Product";
$pageTitle = "Product List";

require_once 'views/template/header.php';



// get set querystring
parse_str($_SERVER['QUERY_STRING'], $query);
$pageSize = isset($query["pageSize"]) ? $query["pageSize"] : 20;
$ProductName =  isset($query["ProductName"]) ? $query["ProductName"] : "";
$pageNo = isset($query["pageNo"]) ? $query["pageNo"] : 1;

$array_colomns = [
  "ProductID" => "品牌圖片",
  "ProductName" => "品牌名稱",
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
$ProductsTotal = $data->getAllCount()->Total;
$ProductsCount = $ProductName == "" ? $ProductsTotal : $data->getAllLikeCount($ProductName)->Count;
$pagesCount = ceil((int) $ProductsCount / (int) $pageSize);

#拿資料________________________________
// $products = $data->getAll();
$products = $data->getAllLike($ProductName, $column, $sort, $pageStartIndex, $pageSize);
#______________________________________
?>



<script>
// 點擊顯示詳細庫存
function displayMore(TagName){
 var obj = document.getElementsByName(TagName);
 for(var item in obj){
    if(obj[item].style.display==""){
    obj[item].style.display = "none";
    }else{
    obj[item].style.display = "";
    }
 };
}
// checkbox點擊全選或取消
function checkbox() {
  var selectallcheckbox = document.getElementById("selectallcheckbox").checked;
  var obj = document.getElementsByName("checkbox");
    for (var i = 0; i < obj.length; i++) {
      if (selectallcheckbox == true){
        obj[i].checked = true;
      } else{
        obj[i].checked = false;
      }
    }
}
</script>


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      
    <form name="form" method="get" action="">
        <div class="form-row">
          <div class="col-3">
            <div class="form-group row">
              <label for="pageSize" class="col-6 col-form-label">每頁顯示筆數</label>
              <div class="col-6">
                <select name="pageSize" class="form-control" onchange="this.form.submit()">
                <option value='10' $selected >10</option>
                <option value='20' $selected >20</option>
                  <?php
                  // foreach ($array_pageSize as $thisSize) {
                  //   $selected = $pageSize == $thisSize ? "selected" : "";
                  //   echo "<option value='$thisSize' $selected >$thisSize</option>";
                  // }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-3">
            <label class="col-form-label">
              <?= "總共有：$ProductsTotal 項商品" ?> 
            </label>
          </div>
          <div class="col-3">
            <input type="text" name="ProductName" class="form-control float-right" placeholder="輸入品牌名稱搜尋" value="<?= $ProductName ?>"  >

          </div>
          <div class="col-3">
          <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
            <label class="col-form-label" style="display: ;">
              <?= "搜尋到：$ProductsCount 個項目" ?> 
            </label>
          </div>
        </div>
        <?php 
          // foreach ($hidInputs as $k => $v) {
          //   echo "<input type='hidden' name='$k' value='$v'>";
          // }
        ?>
        
    </form>
      <!-- /.form-row -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <div class=""> <!-- button -->
        <input type="button" class="btn btn-outline-info" id="checkedRevBtn" value="反選">
        <input type="submit" class="btn btn-outline-danger" id="checkedDeleteBtn" name="checkedDeleteBtn" value="勾選下架" onclick="return confirm('是否確認刪除勾選資料')">
      </div>
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>              
            <th><input type="checkbox" id="selectallcheckbox" onclick="checkbox()"></th>
            <th style='width:2%'>ID</th>
            <th style='width:15%'>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Description</th>
            <th style='width:7%'>總庫存</th>
            <th style='width:7%'>訂單量</th>
            <th>單價</th>
            <th>更新日期</th> <!-- Date -->
          </tr>
        </thead>
        <tbody>
          <?php
          $Productsubtitle = "";
          foreach ($products as $pd) {
            if($pd->Discontinued==1){
              $Productsubtitle = "(未上架)";
            }
            //  onclick=\"window.location='/RollinAdmin/Product/Detail/" . $pd->ProductID . "'\"
            echo "<tr ondblclick=\"displayMore('$pd->ProductID');\">";
            echo '<td><input type="checkbox" name="checkbox" id="checkbox' . $pd->ProductID . '" ></td>';
            echo "<td>" .$pd->ProductID."</td>";
            echo "<td><a href=/RollinAdmin/Product/Detail/$pd->ProductID>".$pd->ProductName."</a>".$Productsubtitle."</td>";
            echo "<td>".$pd->BrandName."</td>";
            echo "<td>$pd->CategoryName</td>";
            echo "<td>" . substr($pd->PDescription,0,69) . "</td>";
            echo "<td>$pd->TotalStock</td>";
            echo "<td>002</td>";
            echo "<td>$pd->UnitPrice</td>";
            echo "<td>$pd->Date</td>";
            echo "</tr>";
            //點擊顯示下拉庫存
                  $Stocks = $data->getStock($pd->ProductID);
                  foreach ($Stocks as $pdst) {
                    echo  <<<here
                    <tr name='$pd->ProductID' style='display: none;' >
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899">Size:$pdst->SizeID </td>
                    <td bgcolor="#778899">Color:$pdst->ColorID </td>
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899">pdst:$pdst->UnitInStock</td>
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899"></td>
                    <td bgcolor="#778899"></td>
                    </tr>
                    here;
                  }
              
          }
          ?>
        </tbody>
        <tfoot>
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