<?php 

require 'function.php';

require 'Database.php';

require 'Response.php';

require 'routes.php';






// $id = $_GET['id'] ?? null;

// // wrong way and sql injection vulnerability example
// // $posts = $db->query("SELECT * FROM posts where id = {$id}")->fetchAll();

// // instead of using the above line, we should use prepared statements to prevent SQL injection
// $query = "SELECT * FROM posts WHERE id = :id";
// $params = [':id' => $id];

// $posts = $db->query($query, $params)->fetchAll();


// dd($posts);

// // foreach ($posts as $post) {
// //     echo $post['title'];
// // }   