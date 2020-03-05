<?php

require_once 'core/DB.php';
require_once 'core/App.php';
require_once 'core/Controller.php';

$app = new App();

$pageDir = "";
$pageTitle = "Home";

require_once 'views/template/header.php';

?>

<?php

require_once 'views/template/footer.php';

?>