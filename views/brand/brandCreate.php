<?php

$pageDir = "Brand";
$pageTitle = "Brand Create";

$brand = new Brand();

if (isset($_POST['submit'])) {
  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $data->create($brand);
  if ($brand->BrandID) {
    header("Location: Detail/$brand->BrandID");
    exit();
  }
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <form name="form" method="post" action="Brand/Create" >
        <div class="form-group">
          <label for="txtBrandName">Brand Name</label>
          <input type="text" name="BrandName" class="form-control" id="txtBrandName" placeholder="Enter Brand Name" value="<?= $brand->BrandName ?>">
        </div>
        <div class="form-group">
          <label for="txtDescription">Description</label>
          <textarea name="Description" class="form-control" id="txtDescription" rows="9" placeholder="Enter Description"><?= $brand->Description ?></textarea>
        </div>
        <span>
          <a class="btn btn-outline-dark" href="Brand/List">Back To List</a>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </span>
      </form>
    </div>
    <div class="col-md-4">
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>