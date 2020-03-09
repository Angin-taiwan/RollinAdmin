<?php

// 對應 header template nav active
$pageDir = "Marketing";
$pageTitle = "Marketing Detail";

// breadcrumb 中文化
$pageDirTW = "行銷管理";
$pageTitleTW = "全店優惠細節";

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