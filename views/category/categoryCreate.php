<?php

// 對應 header template nav active
$pageDir = "Category";
$pageTitle = "Category Create";

// breadcrumb 中文化
$pageDirTW = "類別管理";
$pageTitleTW = "類別新增";

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