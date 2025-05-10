<?php


function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
  }
  // dd($_SERVER['REQUEST_URI']);
  
  
function isCurrURL($url) {
  return $_SERVER['REQUEST_URI'] === $url;
}


function authorize($condition, $statusCode = Response::FORBIDDEN){
  if(!$condition) {
    return abort($statusCode);
  }
}