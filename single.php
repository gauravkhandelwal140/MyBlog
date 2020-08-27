<?php 
require_once('./includes/headers.php');


?>
    <div class="fluid-container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-md-5 p-3">
        <?php 
      require_once('./includes/nev.php'); ?>
      </nav> <!--End nav-->

      <section id="main">
        <div class="post-single-information ">
          <?php  
                if(isset($_GET['id']))
                {
                  $id=$_GET['id'];
                  $sql = "SELECT * FROM posts WHERE post_id=$id";
                   $result = mysqli_query($conn, $sql);
                   if (mysqli_num_rows($result) > 0) 
                    {     
                      while($row = mysqli_fetch_assoc($result)) 
                        {
                          $post_status=$row['post_status'];
                          $post_id=$row ['post_id'];
                          $post_title=$row['post_title'];
                          $post_des=$row['post_des'];
                          $post_image=$row['post_image'];
                          $post_date=$row['post_date'];
                          $post_author=$row['post_author'];
                          $post_cat_id=$row['post_cat_id'];
                          ?>
            <div class="container ml-15" >
            <div class="post-single-info ">
              <div class="post-single-80 ">                 
                  <h1 class="category-title">Category:  
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
                            else { 
                                   echo "0 results";
                                 }
                      ?>                            
                    </h1>
                  <h2 class="post-single-title">Title: <?php echo $post_title; ?></h2>
                  <div class="post-single-box">
                      Posted by <?php echo $post_author." At ".$post_date; ?>
                  </div>
            </div>
          </div>
        </div class= "contaner">
          <div class="post-main">
            <img class="d-block" style="width:100%;height:400px" src="./img/<?php echo $post_image; ?>" alt="photo" />
            <p class="mt-4">
              <?php echo $post_des; ?>
            </p>
          </div>
        </div>                           
                
                  <?php  
                        }
                    }
                    else {
                  
                          echo"<h1 class='alert alert-danger'>No Post Found</h1>";
                  
                          } 
                }
          ?>
           <!-- comment block Start -->    
        <div class="comments">
          <?php
            $sql3="SELECT * FROM comments WHERE comment_post_id=$id";
            $result3= mysqli_query($conn , $sql3);
            $comment_count=mysqli_num_rows($result3);
             if (mysqli_num_rows($result)>0)
            {
              echo '<h2 class="comment-count">'.$comment_count.' Comments</h2>';
             //$row_data=mysqli_fetch_assoc($result3);
             while($row_data=mysqli_fetch_assoc($result3)){
             $comment_id=$row_data['comment_id'];
             $comment_des=$row_data['comment_des'];
             $comment_date=$row_data['comment_date'];
             $comment_post_id=$row_data['comment_post_id'];
             $comment_author=$row_data['comment_author'];


             ?>
            <div class="comment-box">
              <img src="./img/avtar.png" style="width:88px;height:88px;border-radius:50%" alt="Author photo" class="comment-photo">
                  <div class="comment-content">
                      <span class="comment-author"><b><?php echo $comment_author; ?></b></span>
                      <span class="comment-date"><?php echo $comment_date; ?></span>
                      <p class="comment-text">
                          <?php echo $comment_des ;?>
                      </p>
              </div>
          </div>

           <?php
               }
            } else
            {
              echo "no data fount";
             } 

            ?>

          <h3 class="leave-comment">Leave a comment</h3>
          <?php
            if(isset($_POST['submit_comt'])){
                $name=trim($_POST['name']);
                $comment=trim($_POST['comment']);
                $date=date('j F Y');
                if(empty($name) || empty($comment))
                  {

                    echo '<div">Please Fill The Form!</>';
                } else{
                        $sqlcomt="INSERT into comments (comment_des,comment_date,comment_author,comment_post_id)
                        VALUES('$comment','$date','$name','$id')";
                        $result_comt=mysqli_query($conn,$sqlcomt);
                  if($result_comt)
                  {
                    $sql5="UPDATE posts Set post_comment = post_comment + 1 WHERE post_id =$id";
                    $result_5=mysqli_query($conn,$sql5);                    
                   // header("Location:single.php?id=$id");
                  }
                  //header("Location:single.php?id=$id");

                  }

          }
          ?>
          <div class="comment-submit">
              <form action="http://localhost/cms/blog/single.php?id=<?php echo $_GET['id']; ?>" class="comment-form" method="POST" >
                  <input class="input" name="name" type="text" placeholder="Enter Full Name">
                 <!--  <input class="input" type="email" placeholder="Enter valid email"> -->
                  <textarea name="comment"  id="" cols="20" rows="5" placeholder="Comment text"></textarea>
                  <input type="submit" value="Submit" name="submit_comt" class="comment-btn">
              </form>
          </div>
        </div>
      </section>

          <?php 
require_once('./includes/footers.php');


?>