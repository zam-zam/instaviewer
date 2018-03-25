<?php
if ($_GET['q']) {
    $query = $_GET['q'];
}

if (strlen($query) > 0) {
    $users = $insta->people->search($query);
    $tags = $insta->hashtag->search($query);
}

$template = $twig->load($match['name'].'.html');
echo $template->render(['users' => $users->users, 'tags' => $tags->results, 'q' => $_GET]);
?>