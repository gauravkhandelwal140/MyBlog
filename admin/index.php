<?php 
require_once('./include/headers.php');
?>
    <?php
     if(!isset($_COOKIE['_ua_'])) {
    header("Location: sign-in.php");
  }
?>

    <div class="fluid-container"> 
      <?php 
          require_once('./include/nev.php');
        ?>

       <!--End nav-->


      <section id="main" class="mx-lg-5 mx-md-2 mx-sm-2">
        <div class="d-flex flex-row justify-content-between">
            <h2 class="my-3">All Posts</h2>
            <a class="btn btn-secondary align-self-center d-block" href="new-post.php">Add New Post</a>
        </div>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Post Title</th>
                <th scope="col">Post Category</th>
                <th scope="col">Post Status</th>
                <!-- <th scope="col" class="d-none d-md-table-cell">Post Tags</th> -->
                <th scope="col" class="d-none d-md-table-cell">Comments</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                     <?php
                      $sql = "SELECT * FROM posts" ;
                       $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) 
                      {     
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                          $post_status=$row['post_status'];
                          $post_id=$row ['post_id'];
                          $post_title=$row['post_title'];
                        //  $post_des=substr($row['post_des'],0,300);
                         // $post_image=$row['post_image'];
                         // $post_date=$row['post_date'];
                          //$post_author=$row['post_author'];
                          $post_comment=$row['post_comment'];
                          $post_cat_id=$row['post_cat_id'];
                          ?>

                          <tr>
                              <td> <?php echo $post_id; ?> </td>
                              <td> <?php echo $post_title; ?> </td>
                              <td>
                                <?php  
                                  $sql2 = "SELECT * FROM categories where cat_id= $post_cat_id ";
                                    $result2 = mysqli_query($conn, $sql2);
                                      if (mysqli_num_rows($result2) > 0) 
                                      {     
                                        while($row2 = mysqli_fetch_assoc($result2)) 
                                            {  
                                              $cate_title=$row2['cat_title'];
                                                 }
                                            echo $cate_title; 
                                              }      
                                        else {  echo "0 results";
                        
                                               }
                                   ?>
                              </td>
                              <td><?php echo $post_status; ?></td>
                              <!-- <td class="d-none d-md-table-cell">works, php</td> -->
                              <td class="d-none d-md-table-cell">
                                <a href="comments.php?id=<?php echo $post_id; ?>"><?php echo $post_comment; ?></a>
                              </td>
                              <td>
                                 <form action="edit-post.php" method="POST">
                                   <input type="hidden" value="<?php echo $post_id; ?>" name="val"/>
                                   <input type="submit" name="delete-post" class="btn btn-link" value="Edit"/>
                                </form>
                              </td>
                              <td>
                                  <form action="index.php" method="post">
                                      <input type="hidden" value="<?php echo $post_id;?>" name="val"/>
                                      
                                      <input type="submit" name="delete-post" value="Delete" class="btn btn-link"/>
                                  </form>               
                              </td>
                            </tr>


                       <?php }
                      }else{
                        echo "Page not found"; 
                      } 

                     
                            ?>

                          <?php 
                          if(isset($_POST['delete-post'])){
                            $pid=$_POST['val'];
                            $deleteSql= "DELETE FROM posts WHERE post_id = $pid";
                            $dResult=mysqli_query($conn , $deleteSql);
                            if($dResult){
                            // echo"<script> alert('1 post Delete') </script>";
                              header("location: index.php");
                                          }
                          }
                              ?>

              
                
            </tbody>
        </table>
    </section>
      <!-- <ul class="pagination px-lg-5">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul> -->
</div>
   <?php require_once('./include/footers.php'); ?>