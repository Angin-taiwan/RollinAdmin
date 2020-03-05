<?php

$pageDir = "Product";
$pageTitle = "Product Create";

require_once 'views/template/header.php';

$newProduct = new Product();
if (isset($_POST["insertButton"])){
  $newProduct->ProductName = $_POST["ProductName"];
  $newProduct->BrandID = $_POST["BrandID"];
  $newProduct->CategoryID = $_POST["CategoryID_All"];
  $newProduct->PDescription = $_POST["PDescription"];
  $newProduct->Discontinued = $_POST["Discontinued"];
  $newProduct->UnitPrice = $_POST["UnitPrice"];
  $newProduct->ProductID = $data->createProduct($newProduct);
  if ($newProduct->ProductID) {
    echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/Detail/$newProduct->ProductID' </script>";
    exit();
  }
  $data->createProduct($newProduct);
  // echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/List' </script>";
}

# 讀資調_________________________
$findmyBrandName = $data->findmyBrandName();
$findmyMainCategoryName = $data->findmyMainCategoryName();
$findmyCldCategoryName = $data->findmyCldCategoryName();

# ----------------------------------------------------------
?>



<div class="container-fluid">
<div class="card">

  <div class="card-body">
  <form method="post" action="Product/Create">
  <!-- ROW 1  -->
  <div class="form-group">
    <div class="form-row">
      <div class="col col-md-8">
        <label for="txtProductName">
          商品名稱
        </label>
        <input type="text" class="form-control" name="ProductName" id="txtProductName" placeholder="Product Name" required="required">
        </div>
      <div class="col col-md-1">
      <label for="txtDiscontinued">
      未上架
        </label>
      <input type="checkbox" class="form-control" name="Discontinued" id="txtDiscontinued" value="1" checked>
      </div>
      </div>
    </div>

  <!-- ROW 2  -->
  <div class="form-group">
    <div class="form-row">
      <div class="col col-md-4">
        <label for="txtBrandID">品牌</label>
        <select class="form-control" name="BrandID" id="txtBrandID">
          <option selected>--</option>
          <?php
          foreach ($findmyBrandName as $bn) {
            echo  <<<here
            <option value="$bn->BrandID">$bn->BrandName</option>
            here;
          }
            ?>
          </select>
      </div>
      <div class="col col-md-2">
        <label for="txtCategoryID_M">主類別</label>
        <select class="form-control" name="CategoryID_M" id="txtCategoryID_M" onchange="ShowMeWhatIWant()" >
          <option value="all" selected>All Category</option>
          <option style="display:none">YouCantSeeMe</option>
          <?php
          foreach ($findmyMainCategoryName as $mcn) {
            echo  <<<here
            <option value="$mcn->CategoryID">$mcn->CategoryID - $mcn->CategoryName</option>
            here;
          }
            ?>
          </select>
      </div>
      <div class="col col-md-3">
        <label for="txtCategoryID_All">子類別</label>


        <select class="form-control" name="CategoryID_All" id="txtCategoryID_All">
          <option selected disabled>Choose Category</option>
          <?php
          foreach ($findmyMainCategoryName as $mcn){
            $findmyCldCategoryName = $data->findmyCldCategoryName($mcn->CategoryID);
            echo  "<option disabled name=\"ParentTitle\">－－－$mcn->CategoryID - $mcn->CategoryName －－－</option>" ;

            foreach ($findmyCldCategoryName as $ccn) {
              echo  <<<here
              <option name="Parent$ccn->ParentID" value="$ccn->CategoryID">$ccn->ParentID - $ccn->CategoryID - $ccn->CategoryName</option>
              here;
            }
          }
            ?>
          </select>
          <?php
          foreach ($findmyMainCategoryName as $mcn){
            echo  <<<here
            <select class="form-control" name="CategoryID" style="display:none" onchange="SetCvalue(this.value);">
            <option selected disabled >－－－$mcn->CategoryID - $mcn->CategoryName －－－</option>
            here;
            $findmyCldCategoryName = $data->findmyCldCategoryName($mcn->CategoryID);
            foreach ($findmyCldCategoryName as $ccn) {
              echo  <<<here
              <option name="Parent$ccn->ParentID" value="$ccn->CategoryID">$ccn->ParentID - $ccn->CategoryID - $ccn->CategoryName</option>
              here;
            }
            echo "</select>";
          }
            ?>




      </div>
      <div class="col col-md-3">
        <label for="txtUnitPrice">單價</label>
        <input type="number" class="form-control" name="UnitPrice" id="txtUnitPrice" placeholder="UnitPrice">
      </div>
    </div>
  </div>

  <!-- ROW 3  -->
  <div class="form-group">
    <label for="PDescription">商品描述</label>
    <textarea class="form-control" name="PDescription" id="txtPDescription" rows="3" placeholder="請輸入商品描述"></textarea>
  </div>

  <div class="form-group">
    <input type="file" class="file" id="input-b3" name="input-b3[]" multiple 
      data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..."><!-- plugins.krajee -->
  </div>

  <hr><!-- 設定庫存： -->
  <div class="form-group">
    <h5>設定庫存：</h5>

    <div class="form-row">
      <div class="col col-md-4">
        <label for="txtSizeID">尺寸</label>
        <select class="form-control" name="SizeID" id="txtSizeID">
          <option selected>Choose Size</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="ColorID">顏色</label>
        <select class="form-control" name="ColorID" id="txtColorID">
          <option selected>Choose Color</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="txtUnitInStock">數量</label>
        <input type="number" class="form-control" name="UnitInStock" id="txtUnitInStock" placeholder="UnitInStock">
      </div>
    </div>
    
    <div class="form-row">
      <div class="col col-md-4">
        <label for="txtSizeID">尺寸</label>
        <select class="form-control" name="SizeID" id="txtSizeID">
          <option selected>Choose Size</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="ColorID">顏色</label>
        <select class="form-control" name="ColorID" id="txtColorID">
          <option selected>Choose Color</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="txtUnitInStock">數量</label>
        <input type="number" class="form-control" name="UnitInStock" id="txtUnitInStock" placeholder="UnitInStock">
      </div>
    </div>

    <div id="tablhere">table will generate here</div>
  </div>

  <div class="form-group">
  <label for="insert_rows">繼續增加　</label>
  <input style='width:5%' type="number" name="insert_rows" id="insert_rows" value="1" min="1" onchange="CreateRows()">
  <label for="insert_rows">　項</label>
  </div>

  <!-- btn -->
  <div>
    <button type="submit" class="btn btn-success" name="insertButton" id="insertButton">新增資料</button>
    <button type="reset" class="btn btn-danger">清除資料</button>
  </div>

  </form>
  </div><!-- /.card-body -->

</div><!-- /.card -->

</div><!-- /.container-fluid -->


<?php

require_once 'views/template/footer.php';

?>

<script>
  let Rows=1 ;

  // 繼續增加多項庫存 (未完成~~~~~~~~~~~~~)
  function CreateRows(){ 
    Rows = Number(document.getElementById("insert_rows").value);
  };

  // 由主類別拿子類別
  function ShowMeWhatIWant() {
    var CategoryID_M = document.getElementsByName("CategoryID_M")[0];
    var CategoryID = document.getElementsByName("CategoryID");
    var CategoryID_All = document.getElementsByName("CategoryID_All")[0];
    CategoryID_All.style.display="none";

    for(var i=0; i < 4; i++){
    CategoryID[i].style.display = "none";
    };

    if(CategoryID_M.value !="all"){
    CategoryID[CategoryID_M.value-1].style.display="";
    } else{
      CategoryID_All.style.display="";
    };
  }

  function SetCvalue(id){
    var CategoryID_All = document.getElementsByName("CategoryID_All")[0];
    CategoryID_All.value =id;
  }


  // 測試用fnc
  function Testing001() {
    alert("Hello! I am an alert box!!");
  };

</script>