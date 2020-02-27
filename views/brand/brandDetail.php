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
          <a class="text-dark" href="#"><?=$brand->BrandName?></a>
        </h3>
        <p class="card-text mb-auto"><?=$brand->Description?></p>
        <?="<a href=/RollinAdmin/Brand/Update/$brand->BrandID>Edit</a>"?>
      </div>
      <?="<img class=card-img-right flex-auto d-none d-md-block src=image/BrandLogo/" . str_replace(' ', '', $brand->BrandName) . ".jpg />";?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>