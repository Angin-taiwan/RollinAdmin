<?php

$pageDir = "Product";
$pageTitle = "Product List";

require_once 'views/template/header.php';
$sqlContext = "select * from product as p 
left outer join brand as b on p.BrandID = b.BrandID 
left outer join category as c on p.CategoryID = c.CategoryID ; " ;

$products = $data->selectDB($sqlContext);

?>

<!-- <div class="container-fluid">
  <?= $pageTitle ?> content here
</div> -->

<script language="javascript">
function TestBlack(TagName){
 var obj = document.getElementsByName(TagName);
 for(var item in obj){
    if(obj[item].style.display==""){
    obj[item].style.display = "none";
    }else{
    obj[item].style.display = "";
    }
 };
}
</script>


<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="listTable" class="table table-bordered table-hover">
        <thead>
          <tr>              
            <th><input type="checkbox" id="selectallcheckbox" onclick=""></th>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Description</th>
            <th>庫存</th>
            <th>訂單量</th>
            <th>單價</th>
            <th>更新日期</th> <!-- Date -->
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($products as $pd) {
            //  onclick=\"window.location='/RollinAdmin/Product/Detail/" . $pd->ProductID . "'\"
            echo "<tr onclick=\"TestBlack('$pd->ProductID');\">";
            echo '<td><input type="checkbox" id="checkbox' . $pd->ProductID . '"></td>';
            echo "<td style='width:2%'> $pd->ProductID </td>";
            echo "<td style='width:15%'>$pd->ProductName</td>";
            echo "<td>".$pd->BrandName."</td>";
            echo "<td>$pd->CategoryName</td>";
            echo "<td>" . substr($pd->PDescription,0,69) . "</td>";
            echo "<td>001</td>";
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
                    <td bgcolor="#778899">pdst:$pdst->ColorID </td>
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