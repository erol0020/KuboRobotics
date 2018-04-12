<?php
if(isset($_GET['page']) && isset($_GET['post'])){
  if($_GET['post'] === 'new'){
    require_once('pages/forum-new.php');
  } else {
    $id = ltrim($_GET['post'], 'post-');
    require_once('pages/forum-view.php');
  }
} else {
  require_once('pages/forum-list.php');
}
?>
