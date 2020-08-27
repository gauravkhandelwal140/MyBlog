
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

            <?php 
            if(isset($_POST['add-new-cat']))
            {
                $cat_title=trim($_POST['cat-title']);
                if(empty($cat_title)){
                    $error="<div class='alert alert-danger'>Field can't be blank</div>";
                }else{
                    $sqlCat1="INSERT INTO categories (cat_title) VALUE ( '$cat_title' )";
                    $catResult=mysqli_query($conn,$sqlCat1);
                    if($catResult){
                        header("Location:categories.php");
                    }
                }
            }
            ?>
            <form class="py-4" action="categories.php" method="POST">
                <div class="row">
                    <div class="col">
                        <input name="cat-title" type="text" class="form-control" placeholder="Enter category name">
                    </div>
                    <div class="col">
                        <input name="add-new-cat" type="submit" class="form-control btn btn-secondary" value="Add New Category">
                        <?php 
                        if(isset($error)){
                            echo $error;
                        }

                        ?>
                    </div>
                </div>
            </form>
            <?php
             if(isset($_POST['update-cat']))
                    {

                        $cat_t=trim($_POST['cat-t']);
                        if(empty($cat_t)){
                            echo "<div class='alert alert-danger'>Field can't be blank</div>";
                        }else{
                        $catid=$_POST['value'];
                        $upsql="UPDATE categories SET cat_title = '$cat_t' WHERE cat_id = $catid ";
                        $upResult=mysqli_query($conn,$upsql);
                        if($upResult)
                        {
                            header("Location:categories.php");    
                        }

                    }}
                if(isset($_POST['update-category'])){
                    $id = $_POST['edit-cat-id'];
                    $tit = $_POST['edit-cat-title'];

                    ?>
                    <form class="py-4" action="categories.php" method="POST">
                <div class="row">
                    <div class="col">
                        <input type="hidden" value="<?php echo $id; ?>" name="value"/>
                        <input name="cat-t" value="<?php echo $tit; ?>" type="text" class="form-control" placeholder="Enter category name">
                    </div>
                    <div class="col">
                        <input name="update-cat" type="submit" class="form-control btn btn-primary" value="Update Category">
                    </div>
                </div>
            </form>
                    <?php
                }

                ?>

            <?php 
                          if(isset($_POST['delete-cat'])){
                            $cid=$_POST['del_val'];
                            $deleteSql= "DELETE FROM categories WHERE cat_id = $cid";
                            $dResult=mysqli_query($conn , $deleteSql);
                            if($dResult){

                             // echo"<script> alert('1 post Delete') </script>";
                              header("location: categories.php");
                                          }
                          }
                              ?>




            <h2>All Categories</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr> 
                </thead>
                <tbody>
                <?php 
                    $sqlCat="SELECT * FROM categories";
                    $resultCat= mysqli_query ($conn, $sqlCat);
                    if(mysqli_num_rows($resultCat) > 0){
                        while($catRow=mysqli_fetch_assoc($resultCat))
                        {
                            $catId=$catRow['cat_id'];
                            $catTitle=$catRow['cat_title'];
                            ?>
                            <tr>
                                <th><?php echo $catId; ?></th>
                                <td><?php echo $catTitle; ?></td>
                                <td>
                                <form method="POST" action="categories.php">
                                    <input type='hidden' name="edit-cat-title" value="<?php echo $catTitle; ?>" />
                                    <input type="hidden" name="edit-cat-id" value="<?php echo $catId; ?>"/>
                                    <input type="submit" name="update-category" value="Edit" class="btn btn-link"/>
                                </form>
                            </td>
                            <td>
                                <form action="categories.php" method="post">
                                      <input type="hidden" value="<?php echo $catId;?>" name="del_val"/>
                                      
                                      <input type="submit" name="delete-cat" value="Delete" class="btn btn-link"/>
                                  </form>  
                            </td>
                            </tr>
                <?php
                 }
                    } 

                ?>
                </tbody>
            </table>
        </section>

    </div>
</div> <?php require_once('./include/footers.php'); ?>