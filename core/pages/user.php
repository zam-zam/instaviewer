<?php
$username = $match['params']['username'];
$userId = $insta->getUsernameId($username);
$feed = $insta->getUserFeed($userId);

$next_max_id = $feed->next_max_id;
$items = $feed->items;

$route = $router->generate('media', array('mediaId' => 0));

$template = $twig->load('feed.html');
echo $template->render(array('feed' => $items, 'route' => explode('/', $route)[1]));
?>