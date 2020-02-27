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

if (isset($_POST['delete'])) {
  $brand->BrandID = $_POST['BrandID'];
  $data->delete([$brand->BrandID]);
  header("Location: ../List");
  exit();
}

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <div class="col-md-8">
    <form name="form" method="post" action="Brand/Update/<?= $brand->BrandID ?>">
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
        <a class="btn btn-outline-dark" href="Brand/Detail/<?= $brand->BrandID ?>">Back To Detail</a>
        <input type="hidden" name="BrandID" value="<?= $brand->BrandID ?>">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#myModal">
          Delete
        </button>
      </span>
      <!-- The Modal -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Delete this brand, Are You SURE?</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              Warning: This action cannot be undone!
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" name="delete" class="btn btn-danger">Comfirm Delete</button>
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>