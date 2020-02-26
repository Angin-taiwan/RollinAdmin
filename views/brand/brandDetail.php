<?php

$pageDir = "Brand";
$pageTitle = "Brand Detail";

require_once 'views/template/header.php';

$brand = $data->get($data->id);

?>
<div class="container-fluid">

  <div class="col-md-6">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          <a class="text-dark" href="#"><?= $brand->BrandName ?></a>
        </h3>
        <p class="card-text mb-auto"><?= $brand->Description ?></p>
        <a href="#">Edit</a>
      </div>
      <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>