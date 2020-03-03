<?php

$pageDir = "Product";
$pageTitle = "Product Create";

require_once 'views/template/header.php';

$newProduct = new Product();
if (isset($_POST["insertButton"])){
  $newProduct->ProductName = $_POST["ProductName"];
  $newProduct->BrandID = $_POST["BrandID"];
  $newProduct->CategoryID = $_POST["CategoryID"];
  $newProduct->PDescription = $_POST["PDescription"];
  // $newProduct->Discontinued = $_POST[];
  $newProduct->UnitPrice = $_POST["UnitPrice"];
  $newProduct->ProductID = $data->createProduct($newProduct);
  if ($newProduct->ProductID) {
    echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/Detail/$newProduct->ProductID' </script>";
    exit();
  }
  $data->createProduct($newProduct);
  // echo "<script> alert('新增成功');location.href = '/RollinAdmin/Product/List' </script>";
}

?>

<div class="container-fluid">
<div class="card">

  <div class="card-body">
  <form method="post" action="Product/Create">
  <!-- ROW 1  -->
  <div class="form-group">
      <label for="ProductName">
        商品名稱
      </label>
      <input type="text" class="form-control" name="ProductName" id="ProductName" placeholder="Product Name" required="required">
    </div>

  <!-- ROW 2  -->
  <div class="form-group">
    <div class="form-row">
      <div class="col col-md-4">
        <label for="txtBrandID">品牌</label>
        <select class="form-control" name="BrandID" id="txtBrandID">
          <option selected>Choose Brand</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="txtCategoryID">類別</label>
        <select class="form-control" name="CategoryID" id="txtCategoryID">
          <option selected>Choose Category</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          </select>
      </div>
      <div class="col col-md-4">
        <label for="txtUnitPrice">單價</label>
        <input type="number" class="form-control" name="UnitPrice" id="txtUnitPrice" placeholder="UnitPrice">
      </div>
    </div>
  </div>

  <!-- ROW 3  -->
  <div class="form-group">
    <label for="PDescription">商品描述</label>
    <textarea class="form-control" name="PDescription" id="txtPDescription" rows="3"></textarea>
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
  </div>

  <div class="form-group">
  <label for="insert_rows">繼續增加　</label>
  <input style='width:5%' type="number" name="insert_rows" id="insert_rows" value="2" min="1">
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