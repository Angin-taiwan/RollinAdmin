<?php

$pageDir = "Product";
$pageTitle = "Product Create";

require_once 'views/template/header.php';

// 建立商品
$newProduct = new Product();
// 建立商品庫存

// 按下按鈕
if (isset($_POST["insertButton"])){
  $newProduct->ProductName = $_POST["ProductName"];
  $newProduct->BrandID = $_POST["BrandID"];
  $newProduct->CategoryID = $_POST["CategoryID_All"];
  $newProduct->PDescription = $_POST["PDescription"];
  $newProduct->Discontinued = $_POST["Discontinued"];
  $newProduct->UnitPrice = $_POST["UnitPrice"];
  $newProduct->ProductID = $data->createProduct($newProduct);
  for ($j = 1; $j <= (int)$_POST['insert_rows']; $j++) {
    $newProductstocks = new Product();
    $newProductstocks->ProductID = $newProduct->ProductID ;
    $newProductstocks->SizeID = $_POST["SizeID$j"];
    $newProductstocks->ColorID = $_POST["ColorID$j"];
    $newProductstocks->UnitInStock = $_POST["UnitInStock$j"];
    $newProductstocks->ProductID = $data->stocksFirst($newProductstocks);
}


  if ($newProduct->ProductID) {
    echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/Detail/$newProduct->ProductID' </script>";
    exit();
  }
  // $data->createProduct($newProduct);
  // echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/List' </script>";
}

# 讀資調_________________________
$findmyBrandName = $data->findmyBrandName();
$findmyMainCategoryName = $data->findmyMainCategoryName();
// $findmyCldCategoryName = $data->findmyCldCategoryName(); #移至下方

$findmyColorName = $data->findmyColorName();

# ----------------------------------------------------------
// if(isset($_POST['CategoryID_All']))
$P_Name = isset($_POST['ProductName']) ? $_POST['ProductName'] : "";
$P_B = isset($_POST['BrandID']) ? $_POST['BrandID'] : 0;
$P_Dis = isset($_POST['Discontinued']) && $_POST['Discontinued']==0  ? 0 : 1;
$CatID_M = isset($_POST['CategoryID_M']) ? $_POST['CategoryID_M'] : NULL;
$CatID = isset($_POST['CategoryID_All']) ? $_POST['CategoryID_All'] : "0";
$P_UnitPrice = isset($_POST['UnitPrice']) ? $_POST['UnitPrice'] : NULL;
$P_PDescription = isset($_POST['PDescription']) ? $_POST['PDescription'] : NULL;
$P_insert_rows = isset($_POST['insert_rows']) ? $_POST['insert_rows'] : 1;

// set hidden inputs CategoryID_M
$hidInputs = [
  'P_Name' => $P_Name,
  'P_Dis' => $P_Dis,
  'P_B' => $P_B,
  'CatID_M' =>$CatID_M,
  'CatID_All' =>$CatID,
  'P_UnitPrice'=>$P_UnitPrice,
  'P_PDescription'=>$P_PDescription,
  'P_insert_rows'=>$P_insert_rows

];



?>




<div class="container-fluid">
<div class="card">

  <div class="card-body">
  <form method="post" action="Product/Create">
  <?php 
          foreach ($hidInputs as $k => $v) {
            echo "<input type='hidden' name='$k' value='$v'>";
          }
        ?>
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
  <div class="form-row">

      <div class="form-group col-md-4">
        <label for="txtBrandID">品牌</label>
        <select class="form-control" name="BrandID" id="txtBrandID">
          <option value="0" selected>--</option>
          <?php
          foreach ($findmyBrandName as $bn) {
            echo  <<<here
            <option value="$bn->BrandID">$bn->BrandName</option>
            here;
          }
            ?>
          </select>
      </div>
      <div class="form-group col-md-2">
        <label for="txtCategoryID_M">主類別</label>
        <select class="form-control" name="CategoryID_M" id="txtCategoryID_M" onchange="this.form.submit()" >
          <!-- onchange="ShowMeWhatIWant()" -->
          <option value="0" selected>All Category</option>
          <?php
          foreach ($findmyMainCategoryName as $mcn) {
            echo  <<<here
            <option value="$mcn->CategoryID">$mcn->CategoryID - $mcn->CategoryName</option>
            here;
          }
            ?>
          </select>
      </div>
      <div class="form-group col-md-3">
        <label for="txtCategoryID_All">子類別</label>

<!-- 全部選單 -->
        <select class="form-control" name="CategoryID_All" id="txtCategoryID_All" onchange="this.form.submit()">
          <option value="0" selected>Choose Category</option>
          
          <?php
            $findmyCldCategoryName = $data->findmyCldCategoryName($CatID_M);
            echo  "<option disabled name=\"ParentTitle\">－－－$CatID_M - CategoryName!! －－－</option>" ;
            $mynumber=1;
            foreach ($findmyCldCategoryName as $ccn) {
              echo  <<<here
              <option name="Parent$ccn->ParentID" value="$ccn->CategoryID">$ccn->ParentID - $mynumber 　$ccn->CategoryName</option>
              here;
              $mynumber++;
            }
          

          // foreach ($findmyMainCategoryName as $mcn){
          //   $mynumber=1;
          //   $findmyCldCategoryName = $data->findmyCldCategoryName($mcn->CategoryID);
          //   echo  "<option disabled name=\"ParentTitle\">－－－$mcn->CategoryID - $mcn->CategoryName －－－</option>" ;

          //   foreach ($findmyCldCategoryName as $ccn) {
          //     echo  <<<here
          //     <option name="Parent$ccn->ParentID" value="$ccn->CategoryID">$ccn->ParentID - $mynumber 　$ccn->CategoryName</option>
          //     here;
          //     $mynumber++;
          //   }
          // }
            ?>
          </select>
<!-- 部分選單 -->
          <?php
          // foreach ($findmyMainCategoryName as $mcn){
          //   $mynumber=1;
          //   echo  <<<here
          //   <select class="form-control" name="CategoryID"  onchange="SetCvalue(this.value);" onchange="this.form.submit()">
          //   <option selected disabled >－－－$mcn->CategoryID - $mcn->CategoryName －－－</option>
          //   here;
          //   $findmyCldCategoryName = $data->findmyCldCategoryName($mcn->CategoryID);
          //   foreach ($findmyCldCategoryName as $ccn) {
          //     echo  <<<here
          //     <option name="Parent$ccn->ParentID" value="$ccn->CategoryID">$ccn->ParentID - $mynumber 　$ccn->CategoryName</option>
          //     here;
          //     $mynumber++;
          //   }
          //   echo "</select>";
          // }
            ?>
      </div>
      <div class="form-group col-md-3">
        <label for="txtUnitPrice">單價</label>
        <input type="number" min="0" class="form-control" name="UnitPrice" id="txtUnitPrice" placeholder="UnitPrice">
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


    
    <?php #好多好多庫存在這裡
    $findmySizeName = $data->findmySizeName($CatID); 
    for ($x = 1; $x < (int)$P_insert_rows+1; $x++) {
      if($x ==1){
        echo '<div class="form-row">';
        echo '<h5>設定庫存：</h5></div>';
      } 
      echo <<<here
      <div class="form-row">
      <div class="form-group col-md-4">
        <label for="txtSizeID">尺寸</label>
        <select class="form-control" name="SizeID$x" id="txtSizeID$x">
          <option value="0" selected>One Size</option>
here ;
$count =1;
      foreach ($findmySizeName as $sn) {

        echo  <<<here
        <option value="$sn->SizeID" name="cID$sn->CategoryID">$count - $sn->SizeName</option>
here;
$count++;
      };
      echo <<<here
      </select>
      </div>

      <div class="form-group col-md-4">
        <label for="ColorID">顏色</label>
        <select class="form-control" name="ColorID$x" id="txtColorID$x">
          <option value="0" selected>None Color</option>
here;
$count =1;
          foreach ($findmyColorName as $cn) {
            echo  <<<here
            <option value="$cn->ColorID">$count - $cn->Color</option>
here;
$count++;
          }
          echo <<<here
          </select>
          </div>
          
          <div class="form-group col-md-4">
            <label for="txtUnitInStock">數量</label>
            <input type="number" min="0"  class="form-control" name="UnitInStock$x" id="txtUnitInStock$x" placeholder="UnitInStock">
          </div>

        </div><!-- /form-row -->

here;
    };
    ?>



  <div class="form-group">
  <label for="insert_rows">繼續增加　</label>
  <input style='width:5%' type="number" name="insert_rows" id="insert_rows" min="0" onblur="this.form.submit()">
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
  // let Rows=1 ;

  // // 繼續增加多項庫存 (未完成~~~~~~~~~~~~~)
  // function CreateRows(){ 
  //   Rows = Number(document.getElementById("insert_rows").value);
  // };

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
<script>
  var P_Name = document.getElementById("txtProductName");
  P_Name.value =document.getElementsByName("P_Name")[0].value ;

  var P_B = document.getElementsByName("BrandID")[0];
  P_B.value =<?=$P_B?> ;

  var P_Dis = document.getElementsByName("P_Dis")[0];
  if(P_Dis.value ==0){
    document.getElementById("txtDiscontinued").checked = false;
  }
  var CategoryID_M = document.getElementsByName("CategoryID_M")[0];
  CategoryID_M.value =<?=(int)$CatID_M?>

  var CategoryID_All = document.getElementsByName("CategoryID_All")[0];
  CategoryID_All.value =<?=(int)$CatID?> ;
  


  var P_UnitPrice = document.getElementsByName("UnitPrice")[0];
  P_UnitPrice.value = parseInt(document.getElementsByName("P_UnitPrice")[0].value );

  var P_PDescription = document.getElementsByName("PDescription")[0];
  P_PDescription.value =document.getElementsByName("P_PDescription")[0].value  ;

  var P_insert_rows = document.getElementsByName("insert_rows")[0];
  P_insert_rows.value = parseInt(document.getElementsByName("P_insert_rows")[0].value );

// $P_insert_rows = isset($_POST['insert_rows']) ? $_POST['insert_rows'] : NULL;


  </script>