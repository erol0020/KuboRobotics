<?php require_once('code/navigation.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Title -->
  <title><?php echo getPages($_GET['page'], $navigation, true) ?> - The Educational Community and Curriculum Platform</title>

  <!-- Meta -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSS -->
  <link rel="stylesheet" href="css/main.css">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="img/icon.ico">

</head>
<body class="main-wrapper">
  <header class="main-header">
    <a class="main-logo" href="./index.php">
      <img src="img/logo.png" alt="Kedu logo">
    </a><!--/.main-logo-->


    <nav class="main-nav">
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Lesson Plans</a></li>
        <?php getNavigation($_GET['page'], $navigation) ?>
      </ul>
    </nav><!--/.main-nav-->

    <a href="#" class="main-profile">
      <span class="profile-icon"></span>Flemming Dibs
    </a>
  </header><!--/.main-header-->

  <div class="main-container">
    <?php getPages($_GET['page'], $navigation, false) ?>
  </div>

</body>
</html>
