<?php 

// include "../libs/database.php";
// include "../functions.php";
// $db = new database();


//   $id = $_GET['id'];

// $query = "SELECT * FROM categories where id ='$id'";

// $cats = $db->select($query);
// $single = $cats->fetch_array();



// if(isset($_POST['update'])) 
// { 
//   $title = $_POST['title'];

//   if ($title == '') 
//   {
//     echo "<center>fill all fields</center>";
//   }
//   else 
//   { 
//     $query = "UPDATE categories  SET title = '$title' WHERE id='$id'";
//     $run = $db->update($query);
//   }

//   }

?>

<?php
  $host = '127.0.0.1';
  $db   = 'ORG';
  $user = 'root';
  $pass = 'root';
  $charset = 'utf8';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $opt = [
	  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	  PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  $pdo = new PDO($dsn, $user, $pass, $opt);
  try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
$dep = 'HR';
$stmt = $pdo->prepare('SELECT FIRST_NAME FROM Worker WHERE DEPARTMENT = ?');
$stmt->execute([$dep]);
$stmt2 = $pdo->prepare('SELECT FIRST_NAME FROM Worker WHERE DEPARTMENT = :name');
$stmt2->execute(['name'=>$dep]);
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo $row['FIRST_NAME'] . "<br>";
}
while ($row = $stmt2->fetch(PDO::FETCH_LAZY))
{
    echo $row['FIRST_NAME'] . "<br>";
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
      <form method="POST" action="edit_category.php?id=<?php echo $single['id'];?>" class="mb-5">
          <div class="form-group">
            <label>Category Title</label>
            <input name="title" value="<?php echo $single['title']; ?>" type="text" class="form-control">
          </div>
          <button class="btn btn-primary" name="update" type="submit">Submit form</button>
          <a class="btn btn-danger" href="index.php">Cancel</a>
          <a class="btn btn-danger" href="delete_category.php?id=<?php echo $single['id']; ?>">Cancel</a>
    </form>


    </div><!-- /.blog-main -->
    