<?php

$pageDir = "Order";
$pageTitle = "Order Detail";

$Order = $data->get($data->id);

require_once 'views/template/header.php';

?>

<div class="container-fluid">

  <div class="col-md-12">
    <div class="card flex-md-row mb-4 box-shadow h-md-250">
      <div class="card-body d-flex flex-column align-items-start">
        <h3 class="mb-0">
          <span class="text-dark">訂單明細</span>
        </h3>
        <p class="card-text my-3"><?=$Order->Description?></p>
        <span>
          <a class="btn btn-outline-dark" href="Order/List">Back To List</a>
          <?="<a class='btn btn-outline-primary' href=/RollinAdmin/Order/Update/$Order->OrderID>Edit</a>"?>
        </span>
      </div>
      <?="<img class='card-img-right flex-auto img-fluid w-100' src=image/" . str_replace(' ', '', $Order->OrderID) . ".jpg />";?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>