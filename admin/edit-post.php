
<?php 
require_once('./include/headers.php');
?>
<?php
  if(!isset($_COOKIE['_ua_'])) {
    header("Location: sign-in.php");
  }
?>

<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: index.php");
    }

    if(isset($_POST['val']))
    {
        $pid =$_POST['val'];
        $sql = "SELECT * FROM posts WHERE post_id= $pid" ;
        $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) 
                      {     
                        while($row = mysqli_fetch_assoc($result)) 
                        {
                          $post_status=$row['post_status'];
                          $post_id=$row['post_id'];
                          $post_title=$row['post_title'];
                        //  $post_des=substr($row['post_des'],0,300);
                          $post_image=$row['post_image'];
                         // $post_date=$row['post_date'];
                          //$post_author=$row['post_author'];
                          $post_comment=$row['post_comment'];
                          $post_cat_id=$row['post_cat_id'];
                          $post_cont=$row['post_des'];
                         // echo $post_id;
                      }
                  }

            }

?>
  <div class="fluid-container">
            <?php 
          require_once('./include/nev.php');
         ?>
 <!--End nav-->        

        <section id="main" class="mx-lg-5 mx-md-2 mx-sm-2 pt-3">
            <h2 class="pb-3">Edit Post</h2>
            <?php
                if(isset($_POST['update-post'])) {
                    $post_title = $_POST['post-title'];
                    $post_cat_id =$_POST['cat-id'];
                    $postid=$_POST['edit-post-id'];
                    //echo $post_cat_id;
                    $post_status = $_POST['post-status'];
                    $post_content = $_POST['post-content'];
                    $post_date = date('j F Y');
                    $post_author = "Gaurav";
                    $post_image = $_FILES['post-image']['name'];
                    $post_temp_image = $_FILES['post-image']['tmp_name'];  
                    move_uploaded_file("{$post_temp_image}", "../img/{$post_image}");
                    if(empty($post_image)){
                      $query="SELECT * FROM Posts WHERE post_id = $postid";
                      $result6 = mysqli_query($conn, $query);
                      if (mysqli_num_rows($result6) > 0) 
                      {     
                        while($rows = mysqli_fetch_assoc($result6)) 
                        {
                          $post_image=$rows['post_image'];
                      }
                  }

                    }
                    if(empty($post_title) || empty($post_cat_id) || empty($post_status) || empty($post_content))
                     {
                        echo "<div class='alert alert-danger'>Field can't be empty!</div>";
                     }else
                        {
                              
                             $sql3 = "UPDATE posts SET post_title='$post_title', post_des ='$post_content', post_image='$post_image', post_date='$post_date', post_author='$post_author',post_cat_id=$post_cat_id, post_status='$post_status' Where post_id=$postid";
                             $result3=mysqli_query($conn, $sql3);
                             if($result3)
                            {
                               header("Location:index.php");

                            }else{ echo "<div class='alert alert-danger'>Post Not Update</div>";}
                        }

                }
             ?>

            <form method="POST" action="edit-post.php" enctype="multipart/form-data">  
                <div class="form-group">
                    <input type="hidden" value="<?php echo $post_id; ?>" name="edit-post-id" >
                    <label for="post-title">Post Title</label>
                    <input name="post-title" value="<?php echo $post_title; ?>" type="text" class="form-control" id="post-title" placeholder="Enter post title">
                </div>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="cat-id" class="form-control" id="category">
                    <?php 
                        $sql5="SELECT * FROM categories";
                        $result5=mysqli_query($conn,$sql5);
                        if (mysqli_num_rows($result5) > 0)
                        {
                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                                $cat_id=$row5['cat_id'];
                                $cat_title=$row5['cat_title'];?>
                                echo "<option value="<?php echo $cat_id; ?>" <?php echo $cat_id== $post_cat_id?'selected':'' ?>><?php echo $cat_title; ?></option>";
                         <?php
                            }
                        }
                     
                         ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="category">Post Status</label>
                    <select name="post-status" class="form-control" id="category">
                        <option <?php echo $post_status == 'Published'?'selected':'' ?>>Published</option>
                        <option <?php echo $post_status == 'Draft'?'selected':'' ?>>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="../img/<?php echo $post_image; ?>"; style ="width:100px; height:100px">
                    <label for="post-image">Upload post image</label>
                    <input name="image" type="file" class="form-control-file" id="post-image">
                </div>
                <div class="form-group">
                    <label for="post-content">Post Content</label>
                    <textarea name="post-content" class="form-control" id="post-content" rows="6"  placeholder="Your post content">
                        <?php echo $post_cont;?>
                    </textarea>
                </div>
                <button name='update-post' type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>

        </div>
             </div> <?php require_once('./include/footers.php'); ?>


    