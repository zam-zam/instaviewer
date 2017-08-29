<?php
$route = $router->generate('index');

$template = $twig->load('index.html');
echo $template->render();
?>