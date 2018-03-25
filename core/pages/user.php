<?php
$username = $match['params']['username'];
$userId = $insta->people->getUserIdForName($username);

if (!empty($_GET) && isset($_GET['next_max_id'])) {
    $max_id = $_GET['next_max_id'];
    $feed = $insta->timeline->getUserFeed($userId, $max_id);
    $next_max_id = $feed->next_max_id;
    $items = $feed->items;
    $route = $router->generate('media', array('mediaId' => 0));
    $template = $twig->load('feed_ajax.html');
    echo json_encode(array('data' => $template->render(array('feed' => $items, 'route' => explode('/', $route)[1])), 'next_max_id' => $next_max_id));
} else {
    $feed = $insta->timeline->getUserFeed($userId);
    // var_dump($feed->items[0]->location);exit();
    $next_max_id = $feed->next_max_id;
    $items = $feed->items;

    /* Узнаём путь для отдельных медиа, чтобы в дальнейшем использовать его в шаблоне в ссылках */
    $route = $router->generate('media', array('mediaId' => 0));
    $url = $router->generate('user', array('username' => $username));

    $template = $twig->load('feed.html');
    echo $template->render(array('feed' => $items, 'next_max_id' => $next_max_id, 'url' => $url ,'route' => explode('/', $route)[1]));
}
?>