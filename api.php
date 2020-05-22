<?php

require_once ('CMySQL.php');
require_once ('CYandexApi.php');

$ya = new CYandexApi();
echo $ya->getHints($_POST['request']);
