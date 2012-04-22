<?php
require_once('tweet_maru.php');
define('CON_KEY', '');
define('CON_SEC', '');
define('A_TOKEN', '');
define('A_TOKEN_SECRET', '');
$tweet = TweetMaru::getInstance(CON_KEY, CON_SEC, A_TOKEN, A_TOKEN_SECRET);
$tweet_id = $tweet->getUserTimeline('', 20);
$tweet->createFavorites($tweet_id);
