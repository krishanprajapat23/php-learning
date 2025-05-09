<?php 

require 'function.php';


// require 'routes.php';

require 'Database.php';

$config = require('config.php');

$db = new Database($config['database']);

$posts = $db->query("SELECT * FROM posts")->fetchAll();

dd($posts);

// foreach ($posts as $post) {
//     echo $post['title'];
// }   