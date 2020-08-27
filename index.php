<?php 
require_once('./includes/headers.php');
?>
    <div class="fluid-container " >
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-md-5 p-3">
              <?php 
              require_once('./includes/nev.php');
              ?>
    </nav><!-- End nav-->

              <?php  
                $post_per_page=3;
                $sql = "SELECT * FROM posts Where post_status ='Published'";

                $result = mysqli_query($conn, $sql);
                 $post_count  = mysqli_num_rows($result);
                // echo $post_count;
                if(isset($_GET['page'])){
                  $page=$_GET['page'];
                    if($page==1){
                          $page_id=0;

                      }
                      else{
                        $page_id=($post_per_page*$page)-$post_per_page;
                      }

                }else{
                  $page_id=0;
                  $page=1;
                }

                 $total_pager=ceil($post_count/$post_per_page);
     ?>
            <section id="main" class="mx-5">
              <h2 class="my-3">All Posts</h2>
      <?php  
                $Pstatus='Published';
                $sql = "SELECT * FROM posts Where post_status = '$Pstatus' LIMIT $page_id , $post_per_page" ;
                $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) 
                  {     
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        $post_status=$row['post_status'];
                        $post_id=$row ['post_id'];
                        $post_title=$row['post_title'];
                        $post_des=substr($row['post_des'],0,300);
                        $post_image=$row['post_image'];
                        $post_date=$row['post_date'];
                        $post_author=$row['post_author'];
                        $post_cat_id=$row['post_cat_id'];
                       // echo $post_cat_id;
                        ?>
                        
                     <div class="row my-4 single-post">
                          <img class="col col-lg-4 col-md-12" src="./img/<?php echo $post_image;?>" alt="Image">
                                  <div class="media-body col col-lg-8 col-md-12">
                                      <h5 class="mt-0"><a href="./single.php?id=<?php echo $post_id;?>"><?php echo $post_title; ?></a></h5>
                        <span class="posted"><a href="http://localhost/cms/blog/categories.php?id=<?php echo $post_cat_id;  ?>" class="category">
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
                        </a> Posted by <?php echo $post_author." At ".$post_date; ?> </span>
                        <p>
                          <?php echo $post_des;?>
                       </p>
                       <span><a href="./single.php?id=<?php echo $post_id;?>" class="d-block">See more &rarr;</a></span>
                    </div>
                   </div>

               <?php  
                    }
                     }
              else {
                  
                    echo "0 results";
                  
                  } 
              ?>
        
      </section>

      <?php 
          if( $post_count > $post_per_page){
        ?>
      <ul class="pagination px-5">
       <?php
            if(isset($_GET['page']))
            {
              $prev=$_GET['page']-1;
            }else{
              $prev=0;
            }
            if($prev+1<=1)
            {
           echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
            }
        else{
              echo '<li class="page-item "><a class="page-link" href="index.php?page='. $prev .'" tabindex="-1">Previous</a></li>';
               }

        ?>
        
        <?php

          if(isset($_GET['page'])){
            $active=$_GET['page'];
          }else{
            $active=1;

          }
            for($i=1;$i<=$total_pager;$i++)
          {
            if( $i==$active){
             echo '<li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
            else{
              echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
            
           }
             ?>
                 <?php
              if(isset($_GET['page'])) {
                  $next = $_GET['page'] + 1;
                
              } else {
                $next = 2;
              }
              if($next-1 >= $total_pager) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
              } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?page='. $next .'">Next</a></li>';
              }
            ?>
            
          </ul>

        <?php }
      ?>

       <?php
require_once('./includes/footers.php');


?>
