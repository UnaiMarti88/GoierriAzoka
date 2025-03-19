<?php

$env = parse_ini_file(__DIR__ . '/../../../.env');
$APP_DIR = $env["APP_DIR"];

require_once($_SERVER["DOCUMENT_ROOT"] . $APP_DIR  . '/src/views/parts/layouts/layoutTop.php');//Aplikazioaren karpeta edozein lekutatik atzitzeko.

require_once(APP_DIR  . '/src/views/parts/sidebar.php');

require_once(APP_DIR  . '/src/views/parts/header.php');

?>

<div class="middle_text">
<img src="<?= HREF_APP_DIR ?>/public/taldeArgazkia.jpg" />
</div>

<?php

require_once(APP_DIR  . '/src/views/parts/layouts/layoutBottom.php');

?>