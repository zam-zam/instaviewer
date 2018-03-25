<?php 
$mediaId = $match['params']['mediaId'];
$media = $insta->media->getInfo($mediaId);
// var_dump($media->items[0]);exit();
$template = $twig->load($match['name'].'.html');
echo $template->render(array('media' => $media->items[0]));
?>