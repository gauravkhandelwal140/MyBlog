<?php 
require_once('./include/headers.php');
?>
<?php
     if(isset($_COOKIE['_ua_'])) {
    header("Location: index.php");
  }
?>
    <div class="container">
        <h2 class="text-uppercase mt-5 sign-in" style="text-align:center">Sign In</h2>

        <?php
            if(isset($_POST['submit']))
            {
                 $user_name= trim($_POST['user_name']);
                 $user_email=trim($_POST['user_email']);
                 $user_password=trim($_POST['user_password']);
                 if(empty($user_name)|| empty($user_email) || empty($user_password)){
                    echo "<div class='alert alert-danger'>invalid information</div>";
                    }else{
                            $sql2="SELECT * FROM users";
                            $result2=mysqli_query($conn,$sql2);
                            if(mysqli_num_rows($result2) > 0)                        
                                {
                                    while($row=mysqli_fetch_assoc($result2))
                                    {
                                        $usr_name=$row['user_name'];
                                        $usr_email=$row['user_email'];
                                        $usr_password=$row['user_password'];

                                        if( $user_name==$usr_name && $user_email==$usr_email && $user_password==$usr_password)
                                        {  
                                            echo "<div class='alert alert-danger'>true input</div>";
                                            setcookie('_ua_', md5(1), time() + 60 * 20, '', '', '', true);
                                            echo "<div class='alert alert-danger'>true input</div>";
                                            header("Location: index.php");

                                        }else
                                        {

                                            echo "<div class='alert alert-danger'>Wrong input</div>";

                                        }
                                    }                                                          
                                } 
                            }
                 
                        } 
                    
                    ?>


        <form class="py-2 d-flex justify-content-center flex-column"  action="#" method="POST" >
            <div class="form-group m-3">
                <label for="username" >Username</label>
                <input type="text" name=user_name class="form-control" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group m-3">
                <label for="email">Email address</label>
                <input type="email" name="user_email" class="form-control" id="email" placeholder="Enter Email Address">
            </div>
            <div class="form-group m-3">
                <label for="password">Password</label>
                <input type="password" name="user_password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary m-3 align-self-end">SIGN IN</button>
        </form>
    </div>
</body>
</html>