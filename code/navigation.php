<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(empty($_GET['page'])){
  $_GET['page'] = '#';
}

$navigation = array(
  'lesson-plans'          => 'Lesson Plans',
  'support'               => 'Support',
  'forum'                 => 'Forum'
);

function getNavigation($page, $nav){
  foreach($nav as $key => $val){
    if($page == $key){
      echo '<li><a class="a-active" href="' . $key . '">' . $val . '</a></li>';
    } else {
      echo '<li><a href="' . $key . '">' . $val . '</a></li>';
    }
  }
}

function getPages($page, $nav, $bool){
  foreach($nav as $key => $val){
    if($page == $key){
      if($bool == true){
        return $val;
      } else {
        require_once('pages/page-' . $key . '.php');
      }
    }
  }
}
