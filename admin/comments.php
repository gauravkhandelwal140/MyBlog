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
            <h2 class="my-3">All Comments</h2>
        </div>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">User name</th>
                <th scope="col">Comment</th>
                <th scope="col" class="d-none d-md-table-cell">In response to</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
              <?php
              $conid=$_GET['id'];
              $comSql="SELECT * FROM comments WHERE comment_post_id = $conid";
              $comResult=mysqli_query($conn, $comSql);
              if (mysqli_num_rows($comResult) > 0) 
                      {     
                        while($comRow = mysqli_fetch_assoc($comResult)) 
                        {

                          
                          $comDes=$comRow['comment_des'];
                          $comAuthor=$comRow['comment_author'];
                          $comId=$comRow['comment_id'];
                      ?>
                          <tr>
                             <td><?php echo $comId; ?></td>
                             <td><?php echo $comAuthor; ?></td>
                             <td><?php echo $comDes; ?></td>
                             <td class="d-none d-md-table-cell">
                             <a href="../single.php?id=<?php echo $conid;?>">
                               <?php
                                    $sql2 = "SELECT * FROM posts WHERE post_id = $conid " ;
                                    $result2 = mysqli_query($conn, $sql2);
                                     if (mysqli_num_rows($result2) > 0) 
                                     {     
                                      while($RowCom = mysqli_fetch_assoc($result2)) 
                                          {
                                              $post_title=$RowCom['post_title'];
                                              echo $post_title;
                                            }
                                          }
                                        ?>



                             </a>
                             </td>
                        <td>

                            <form action="comments.php?id=<?php echo $_GET['id']?>" method="POST">
                                <input type="hidden" name="c_val" value="<?php echo $comId; ?>" >
                                <input name="deleteCom" type="submit" class="btn btn-link" value="Delete" >
                            </form>               
                        </td>
                </tr>


                        <?php
                      }
                      }else
                      {
                        echo "No comment";
                      }
              ?>              

            </tbody>
            
        </table>
        <?php
        if(isset($_POST['deleteCom']))
        {

          $com_id=$_POST['c_val'];
           $sqlcom2="DELETE FROM comments WHERE comment_id =$com_id ";
           $resultcom1=mysqli_query($conn , $sqlcom2);
           if($resultcom1)
           {
              $idcom= $_GET['id'];

             $comSql5=" UPDATE posts SET post_comment = post_comment-1 WHERE post_id = $idcom ";
            $result5=mysqli_query($conn,$comSql5);  
             header("location:comments.php?id={$_GET['id']} ");
          


           }else{

            echo "no";
           }

        }
        ?>
    
      </section>

     <!--  <ul class="pagination px-lg-5">
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
      </ul>
 -->
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</div> 
<?php require_once('./include/footers.php'); ?>