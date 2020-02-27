<?php

$pageDir = "Brand";
$pageTitle = "Brand Update";

$brand = $data->get($data->id);

if (isset($_POST['submit'])) {
  $brand->BrandName = $_POST['BrandName'];
  $brand->Description = $_POST['Description'];
  $brand->BrandID = $_POST['BrandID'];
  $data->update($brand);
  if ($brand->BrandID) {
    header("Location: ../Detail/$brand->BrandID");
    exit();
  }
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="col-md-8">
    <form name="form" method="post" action="Brand/Update/<?=$brand->BrandID?>" >
      <div class="form-group">
        <label for="txtBrandName">Brand Name</label>
        <input type="text" name="BrandName" class="form-control" id="txtBrandName" placeholder="Enter Brand Name" value="<?=$brand->BrandName?>">
      </div>
      <div class="form-group">
        <label for="txtDescription">Description</label>
        <textarea name="Description" class="form-control" id="txtDescription" rows="10" placeholder="Enter Description"><?=$brand->Description?></textarea>
      </div>
      <input type="hidden" name="BrandID" value="<?=$brand->BrandID?> ">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>