<?php 
$cat = new database();
$query = 'SELECT * from categories';
$cats = $cat->select($query);
 ?>

<aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Categories</h4>
        <ol class="list-unstyled mb-0">
          <?php
            while ($row = $cats->fetch_array()) : 
           ?>
          <li><a href="single_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>

        <?php endwhile; ?>
          
          
        </ol>
      </div>

      
    </aside><!-- /.blog-sidebar -->
     </div><!-- /.row -->

</main><!-- /.container -->