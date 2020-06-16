<?php

$fb = new Facebook\Facebook([
    'app_id' => APP_ID,
    'app_secret' => APP_SECRET,
    'default_graph_version' => 'v7.0',
]);

$permissions = [
    'user_birthday',
    'user_hometown',
    'user_location',
    'user_likes',
    'user_photos',
    'user_videos',
    'user_friends',
    'user_status',
    'user_posts',
    'email',
];

function facebook($fields = '', $node = 'me')
{
    try {
        global $fb;

        $param = empty($fields) ? '' : "?fields={$fields}";

        return $fb->get("/" . $node . $param, $_SESSION['fb_access_token']);
    } catch (Exception $e) {
        echo '<b>Error</b>: ' . $e->getMessage();
    }
}


function getReactions($id)
{
    $response = facebook('reactions.type(LIKE).limit(0).summary(total_count).as(like),reactions.type(LOVE).limit(0).summary(total_count).as(love),reactions.type(HAHA).limit(0).summary(total_count).as(haha),reactions.type(WOW).limit(0).summary(total_count).as(wow),reactions.type(SAD).limit(0).summary(total_count).as(sad),reactions.type(ANGRY).limit(0).summary(total_count).as(angry)', $id);

    $body = $response->getDecodedBody();

    $data = [];

    foreach ($body as $key => $item) :
        if($key != 'id') $data[$key] = $item['summary']['total_count'];        
    endforeach;

    return $data;
}


function getPosts()
{
    $response = facebook('posts{name,description,object_id,created_time,picture,link}');
    return $response->getGraphUser()['posts'];
}
