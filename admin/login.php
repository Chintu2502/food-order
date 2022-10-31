<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>login - Food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
            <form action="" method="POST"class="text-center">
            Username:
            <input type="text" name="username" placeholder="Enter Username">
            <br><br>
            Password:
            <input type="password" name="password" placeholder="Enter Password">
            <br><br>
            <input type="submit" name="submit" value="login" class="btn-primary">
            </form>
            <br><br>
            <p class="text-center">Created By- <a href="https://www.linkedin.com/in/byamakesh-palei-179979230?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3BJ45gbsD6SK%2B6BUKtKL9Lmw%3D%3D">byamakesh palei</a> </p>
        </div>
    </body>
</html>
<?php 
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql= "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res= mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count == 1)
    {
        $_SESSION['login']="<div class='success'>Login successful.</div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');
    }else
    {
        $_SESSION['login']="<div class='error text-center'>Login failed.Please try again</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>
 