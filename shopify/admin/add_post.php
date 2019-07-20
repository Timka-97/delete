<?php 

include "../libs/database.php";
include "../functions.php";
$db = new database();
$query = "select * from categories";
$cats = $db->select($query);


if(isset($_POST['submit'])) 
{
  $title = $_POST['title'];
  $content = $_POST['content'];
  $cat = $_POST['cat'];
  $author = $_POST['author'];
  $tags = $_POST['tags'];

  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  if ($title == '' || $content == '' || $cat == '' || $author == '' || $tags == '') 
  {
    echo "<center>fill all fields</center>";
  }
  else 
  {  move_uploaded_file($image_tmp, "../images/$image");
    $query = "INSERT INTO posts (category_id,title,content,author,image,tags) VALUES ('$cat','$title','$content','$author','$image','$tags')";
    $run = $db->insert($query);
  }

  

}
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
    
       <div class="col-sm-8 blog-main offset-2">
      <h2>Add New Post</h2><hr>
      <form method="POST" action="add_post.php" enctype="multipart/form-data" class="mb-5">
          <div class="form-group">
            <label>Post Title</label>
            <input name="title" type="text" class="form-control" placeholder="Enter Tilte">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Post Content</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label>Select category</label>
            <select class="form-control" name="cat">
              <?php while($row = $cats->fetch_array()): ?>
              <option value="<?php echo $row['id']; ?>"><?php echo $row['title'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Author</label>
            <input name="author" type="text" class="form-control" placeholder="Enter Author">
          </div>
          <div class="form-group">
            <label>Post Image</label>
            <input name="image" type="file" class="form-control" placeholder="Upload image">
          </div>
          <div class="form-group">
            <label>Post Tags</label>
            <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
          </div>

          <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
          <a class="btn btn-danger" href="index.php">Cancel</a>
    </form>


    </div><!-- /.blog-main -->
    