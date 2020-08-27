<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $conn = mysqli_connect($servername,$username, $password,$dbname);
    if(!$conn) {
        die("Connection_Failed" . mysqli_connect_error());
        }

?>


        <div class="container">
        <h2 class="pt-4">New User</h2>

        <?php
        if(isset($_POST['sigin']))
        {
            $username=$_POST['username'];
            $email=$_POST['email'];
        $password=$_POST['password'];
        if(empty($username) || empty($email) || empty($password) )
                     {
                        echo "<div class='alert alert-danger'>Field can't be empty!</div>";
                     }else
                        {
                             $sql3 = "INSERT INTO users (user_name, user_email, user_password) VALUES('$username', '$email', '$password')";
                             $result=mysqli_query($conn, $sql3);
                              //echo $result;
                             if($result)
                            {
                                echo "<div class='alert alert-danger'>User Registerd Seccessfull</div>";

                            }else{echo "<div class='alert alert-danger'>User not Registered </div>";}
                        }}
                        ?>
        <form method="post" action="edit-user.php" class="py-2">
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Desired username">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Desired email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password">
                </div>
            <button type="submit" name="sigin" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>