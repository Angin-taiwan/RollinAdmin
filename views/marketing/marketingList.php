<?php

// 對應 header template nav active
$pageDir = "Marketing";
$pageTitle = "Marketing List";

// breadcrumb 中文化
$pageDirTW = "行銷管理";
$pageTitleTW = "全店優惠清單";

# ----------------------------------------------------------
# ----------------------------------------------------------

require_once 'views/template/header.php';

?>

<div class="container-fluid">
  <?= $pageTitle ?> content here
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>