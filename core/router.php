<?php
require __DIR__.'/../vendor/altorouter/altorouter/Altorouter.php';
$router = new Altorouter();
$ctrlFolder = __DIR__.'/pages/';
$router->map('GET','/',$ctrlFolder.'index.php','index');
$router->map('GET','/search',$ctrlFolder.'search.php','search');
$router->map('GET','/popular',$ctrlFolder.'popular.php','popular');
$router->map('GET','/user/[a:username]',$ctrlFolder.'user.php','user');
$router->map('GET','/tag/[a:tag]',$ctrlFolder.'tag.php','tag');
$router->map('GET','/location/[a:location]',$ctrlFolder.'location.php','location');
$router->map('GET','/media/[h:mediaId]',$ctrlFolder.'media.php','media');
?>