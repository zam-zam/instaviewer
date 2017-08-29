<?php 
$mediaId = $match['params']['mediaId'];
$media = $insta->getMediaInfo($mediaId);

$template = $twig->load($match['name'].'.html');
echo $template->render(array('media' => $media->items[0]));
?>