<?php
$tag = $match['params']['tag'];
$feed = $insta->getHashtagFeed($tag);

$next_max_id = $feed->next_max_id;
$items = $feed->items;

/* Узнаём путь для отдельных медиа, чтобы в дальнейшем использовать его в шаблоне в ссылках */
$route = $router->generate('media', array('mediaId' => 0));

$template = $twig->load('feed.html');
echo $template->render(array('feed' => $items, 'route' => explode('/', $route)[1]));
?>