<?php

$pageDir = "Brand";
$pageTitle = "Brand Detail";

$brand = $data->get($data->id);

require_once 'views/template/header.php';

?>

<div class="container-fluid">

  <div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          <span class="text-dark"><?=$brand->BrandName?></span>
        </h3>
        <p class="card-text my-3"><?=$brand->Description?></p>
        <span>
          <a class="btn btn-outline-dark" href="Brand/List">Back To List</a>
          <?="<a class='btn btn-outline-primary' href=/RollinAdmin/Brand/Update/$brand->BrandID>Edit</a>"?>
        </span>
      </div>
      <?="<img class='card-img-right flex-auto img-fluid w-100' src=image/BrandLogo/" . str_replace(' ', '', $brand->BrandName) . ".jpg />";?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>