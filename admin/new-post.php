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

        <section id="main" class="mx-lg-5 mx-md-2 mx-sm-2 pt-3">
            <h2 class="pb-3">Add New Post</h2>

            <?php
                if(isset($_POST['create-post'])) {

                    $post_title = $_POST['post-title'];
                    $post_cat_id =$_POST['cat-id'];
                    //echo $post_cat_id;
                    $post_status = $_POST['post-status'];
                    $post_content = $_POST['post-content'];
                    $post_date = date('j F Y');
                    $post_author = "Gaurav";
                    $post_image = $_FILES['post-image']['name'];
                    $post_temp_image = $_FILES['post-image']['tmp_name'];  
                    move_uploaded_file("{$post_temp_image}", "../img/{$post_image}");
                    if(empty($post_title) || empty($post_cat_id) || empty($post_status) || empty($post_content) || empty($post_image))
                     {
                        echo "<div class='alert alert-danger'>Field can't be empty!</div>";
                     }else
                        {
                             $sql3 = "INSERT INTO posts (post_title, post_des, post_image, post_date, post_author,post_cat_id, post_status) VALUES('$post_title', '$post_content', '$post_image', '$post_date', '$post_author', $post_cat_id, '$post_status')";
                             $result=mysqli_query($conn, $sql3);
                              //echo $result;

                             if($result)
                            {
                                echo "<div class='alert alert-danger'>Post upload Seccessfull</div>";

                            }else{echo "<div class='alert alert-danger'>Post not upload </div>";}
                        }

                }

             ?>

            <form action="new-post.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="post-title">Post Title</label>
                    <input type="text" name="post-title" class="form-control" id="post-title" placeholder="Enter post title">
                </div>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select class="form-control" name="cat-id" id="category">
                        <?php 
                        $sql5="SELECT * FROM categories";
                        $result5=mysqli_query($conn,$sql5);
                        if (mysqli_num_rows($result5) > 0)
                        {
                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                                $cat_id=$row5['cat_id'];
                                $cat_title=$row5['cat_title']; ?>

                           echo "<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>";
                         <?php
                            }
                        }

                                   
                         ?>
                    </select>
                    

                </div>
                <div class="form-group">
                    <label for="category">Post Status</label>
                    <select name="post-status" class="form-control" id="category">
                        <option>Published</option>
                        <option>Draft</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post-image">Upload post image</label>
                    <input type="file" name="post-image" class="form-control-file" id="post-image">
                </div>
                <div class="form-group">
                    <label for="post-content">Post Content</label>
                    <textarea name="post-content" class="form-control" id="post-content" rows="6" placeholder="Your post content"></textarea>
                </div>
                <button type="submit" name="create-post" class="btn btn-primary">Submit</button>
            </form>
        </section>

    </div>
</div> <?php require_once('./include/footers.php'); ?>