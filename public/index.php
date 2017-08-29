<?php
define('ROOT_PATH', dirname(__DIR__));
chdir(dirname(__DIR__));
require 'settings.php';

require 'vendor/autoload.php';
require 'core/instagram.php';
require 'core/twig.php';
/*
**  Routing
*/
require 'core/router.php';
$match = $router->match();
if ($match) {
    require $match['target'];
} else {
    header("HTTP/1.0 404 Not Found");
    exit();
}
?>