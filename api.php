<?php

require_once ('CMySQL.php');
require_once ('CYandexApi.php');

if(isset($_POST['request']) && !empty($_POST['request'])) {
    $ya = new CYandexApi();
    echo $ya->getHints($_POST['request']);
}

if(isset($_POST['todb']) && !empty($_POST['todb'])) {
    $db = new CMySQL();
    $db->addAddress($_POST['todb']);
}
