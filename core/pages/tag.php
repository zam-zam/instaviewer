<?php
$tag = $match['params']['tag'];

if (!empty($_GET) && isset($_GET['next_max_id'])) {
    $max_id = $_GET['next_max_id'];
    $feed = $insta->hashtag->getFeed($tag, $max_id);
    $next_max_id = $feed->next_max_id;
    $items = $feed->items;
    $route = $router->generate('media', array('mediaId' => 0));
    $template = $twig->load('feed_ajax.html');
    echo json_encode(array('data' => $template->render(array('feed' => $items, 'route' => explode('/', $route)[1])), 'next_max_id' => $next_max_id));
} else {
    $feed = $insta->hashtag->getFeed($tag);

    $next_max_id = $feed->next_max_id;
    $items = $feed->items;

    /* Узнаём путь для отдельных медиа, чтобы в дальнейшем использовать его в шаблоне в ссылках */
    $route = $router->generate('media', array('mediaId' => 0));
    $url = $router->generate('tag', array('tag' => $tag));

    $template = $twig->load('feed.html');
    echo $template->render(array('feed' => $items, 'next_max_id' => $next_max_id, 'url' => $url ,'route' => explode('/', $route)[1]));
}
?>