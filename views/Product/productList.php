<?php

$pageDir = "Product";
$pageTitle = "Product List";

require_once 'views/template/header.php';
// $sqlContext = "select * from product as p 
// left outer join brand as b on p.BrandID = b.BrandID 
// left outer join category as c on p.CategoryID = c.CategoryID ; " ;

// $products = $data->selectDB($sqlContext);
$products = $data->getAll();
?>

<!-- <div class="container-fluid">
  <?= $pageTitle ?> content here
</div> -->

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
      
    <div>
      <input type="button" class="btn btn-outline-info" id="checkedRevBtn" value="反選">
      <input type="submit" class="btn btn-outline-danger" id="checkedDeleteBtn" name="checkedDeleteBtn" value="勾選下架" onclick="return confirm('是否確認刪除勾選資料')">
      <div class="float-right">
        <input type="text" placeholder="search" name="keyword">
        <input type="submit" class="btn btn-dark" value="搜尋" name="searchButton">
      </div>
    </div>
      
    </div>
    <!-- /.card-header -->
    <div class="card-body">
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
          foreach ($products as $pd) {
            //  onclick=\"window.location='/RollinAdmin/Product/Detail/" . $pd->ProductID . "'\"
            echo "<tr onclick=\"displayMore('$pd->ProductID');\">";
            echo '<td><input type="checkbox" name="checkbox" id="checkbox' . $pd->ProductID . '" onclick="none"></td>';
            echo "<td> $pd->ProductID </td>";
            echo "<td><a href=/RollinAdmin/Product/Detail/$pd->ProductID>$pd->ProductName</a></td>";
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