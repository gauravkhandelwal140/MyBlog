  <div class="navbar-header">
    <a class="navbar-brand" href="http://localhost/cms/blog/index.php" style="font-size: 22px">HOME</a>
    </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php  
              $sql = "SELECT * FROM categories";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) 
                {     
                  while($row = mysqli_fetch_assoc($result)) 
                      {
                         $cate_id=$row['cat_id'];
                         $cate_title=$row['cat_title'];?>
                            <li class="nav-item <?php echo $cate_id == $id ?'active': "" ?>" >
                                <a class="nav-link" href="http://localhost/cms/blog/categories.php?id=<?php echo $cate_id; ?>"> <?php echo $cate_title; ?></a>
                            </li>
                     <?php  
                      }
                }
                else {                  
                      echo "0 results";
                     }?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="http://localhost/cms/blog/search.php">
            <input name="val" class="form-control mr-sm-2" style="font-size: 14px" type="search" placeholder="  Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        

      </div>


