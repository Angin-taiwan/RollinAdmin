<?php

// 對應 header template nav active
$pageDir = "Category";
$pageTitle = "Category Detail";

// breadcrumb 中文化
$pageDirTW = "類別管理";
$pageTitleTW = "類別細節";

# ----------------------------------------------------------
# ----------------------------------------------------------

require_once 'views/template/header.php';

?>
<div class="container-fluid">
  News Detail, ID = <?= $data->id ?>
</div>
<!-- /.container-fluid -->

<?php

require_once 'views/template/footer.php';

?>