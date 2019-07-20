<?php 

include "../libs/database.php";
include "../functions.php";
$db = new database();

$query = "SELECT * FROM posts";
$posts = $db->select($query);
$query = "select * from categories";
$cats = $db->select($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>PHP blog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

    <!-- Bootstrap core CSS -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex ">
      <a class="p-2 text-muted" href="index.php">Dashboard</a>
      <a class="p-2 text-muted" href="add_post.php">Add new post</a>
      <a class="p-2 text-muted" href="add_category.php">Add new category</a>
      <a class="p-2 text-muted ml-auto" href="../index.php"> View Blog</a>
      <a class="p-2 text-muted" href="logout.php">Logout</a>
    </nav>
  </div>
  </header>

  

  

  

<main role="main" class="container">
  <div class="row">
    
    <div class="col-sm-12 blog-main">
      <?php if(isset($_GET['msg'])){
      $message = $_GET['msg'];
      echo "<div class='alert alert-success'> $message </div>";
    }?>
    <div class=""></div>
        <table class="table table-stripped">
          <tr align="center">
             <td colspan="4"><h1>Manage your posts</h1></td>
          </tr>
          <tr>
            <th scope="col">Post ID</th>
            <th>Post title</th>
            <th>Post author</th>
            <th>Post Date</th>

          </tr>
          <?php while($row1 = $posts->fetch_array()) : ?>
          <tr>
            
            <td><?php echo $row1['id'] ?></td>
            <td>
              <a href="edit_post.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['title'] ?></a></td>
            <td><?php echo $row1['author'] ?></td>
            <td><?php echo formatDate($row1['date']) ?></td>
          
          </tr>
         <?php endwhile; ?>
        </table>

    </div><!-- /.blog-main -->
    
    <div class="col-sm-12 blog-main">
        <table class="table table-stripped">
          <tr align="center">
             <td colspan="4"><h1>Manage your Categories</h1></td>
          </tr>
          <tr>
            <th scope="col">Category ID</th>
            <th>Category title</th>
          </tr>
          <?php while ($row2 = $cats->fetch_array()) :?>
          <tr>
            
            <td><?php echo $row2['id'] ?></td>
            <td><a href="edit_category.php?id=<?php echo $row2['id']; ?>"><?php echo $row2['title'] ?></a></td>
          </tr>
         <?php endwhile; ?>
        </table>

    </div><!-- /.blog-main -->