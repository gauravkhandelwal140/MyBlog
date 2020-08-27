<?php 
require_once('./includes/headers.php');
?>

    <div class="fluid-container">
      <?php
    if(isset($_GET['id']))
    {
      $id=$_GET['id'];
      $sql = "SELECT * FROM categories where cat_id= $id ";
      $result = mysqli_query($conn, $sql);
      $row=mysqli_num_rows($result);
      if (mysqli_num_rows($result)>0) 
      {
        while($row=mysqli_fetch_assoc($result))
        {
            $cate_id=$row['cat_id'];
            $cate_tle=$row['cat_title']; 
               
        }//while end
      
      }else
        {
          $error = true;

         }


    }//else{}
?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-md-5 p-3">
        <?php 
      require_once('./includes/nev.php');
        ?>
      </nav><!-- End nav-->
        
        <?php
        $Pstatus='Published';
      $qid=$_GET['id'];
      $post_per_page=3;
      $sql3 = "SELECT * FROM posts WHERE post_cat_id =$qid AND post_status = '$Pstatus'";

      $result3 = mysqli_query($conn, $sql3);
      $post_count = mysqli_num_rows($result3);
      // echo $post_count;
      if(isset($_GET['page']))
        {
          $page=$_GET['page'];
          if($page==1)
            {
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
       
       <?php
       
        if(isset($error))
        {
          echo "<div class='alert alert-danger'>Page not Found</div>";
          exit;
        }
        
        ?>
       <section id="main" class="mx-5">

        <h2 class="my-3">Category: <?php echo $cate_tle; ; ?> </h2>

        <?php

              if(isset($id))
                {
                  $sql1 = "SELECT * FROM posts WHERE post_cat_id=$id AND  post_status = '$Pstatus' LIMIT $page_id, $post_per_page";
                  $result = mysqli_query($conn, $sql1);
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
                    <div class="row my-4 single-post">
                          <img class="col col-lg-4 col-md-12" src="./img/<?php echo $post_image;?>" alt="Image">
                                  <div class="media-body col col-lg-8 col-md-12">
                                      <h5 class="mt-0"><a href="single.php?id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h5>
                        <span class="posted"><a href="http://localhost/cms/blog/categories.php?id=<?php echo $post_cat_id?>" class="category">
                         <?php  
                            echo $cate_tle;
                          ?>
                        </a> Posted by <?php echo $post_author." At ".$post_date; ?> </span>
                        <p>
                          <?php echo substr($post_des,0,250);?>
                       </p>
                       <span><a href="single.php?id=<?php echo $post_id;?>" class="d-block">See more &rarr;</a></span>
                    </div>
                   </div>

               <?php
                        }//forloop end
                  } else{ echo "0 results";}
                            
                }//1 if else
              ?>
      </section>


       <?php 
          if( $post_count > $post_per_page){
     ?>
      <ul class="pagination px-5">

        <?php
          if(isset($_GET['page'])){
            $prev=$_GET['page']-1;

          }else
          {
            $prev=0;
          }

            if($prev+1<=1)
            {
           echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>';
            }
        else{
              echo '<li class="page-item "><a class="page-link" href="categories.php?id='.$_GET['id'].'&page='. $prev .'" tabindex="-1">Previous</a></li>';
            }

        ?>
        
        <?php

          if(isset($_GET['page']))
            {
              $active=$_GET['page'];
            
            }else
            {
              $active=1;
            }

            for($i=1;$i<=$total_pager;$i++)
          {

            if( $i==$active){
             echo '<li class="page-item active"><a class="page-link" href="categories.php?id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
            }
            else{
              echo '<li class="page-item"><a class="page-link" href="categories.php?id='.$_GET['id'].'&page='.$i.'">'.$i.'</a></li>';
            }
            
           }
             ?>
      <?php
             if(isset($_GET['page'])) {
                  $next = $_GET['page']+1;
                
              } else {
                $next = 2;
              }
           if( $next-1 >= $total_pager)
        {
        echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';
        }
        else{
    
         echo '<li class="page-item "><a class="page-link" href="categories.php?id='.$_GET['id'].'&page='. $next .'">Next</a></li>';
        }?>
        </ul>
      <?php
        
        }   ?>
    <!-- <ul class="pagination px-5">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul> --> 
    
    <?php require_once('./includes/footers.php'); ?>