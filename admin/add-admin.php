<?php include('partials/menu.php') ?> 

<div class="main-content">
    <div class="wrapper"></div>
    <br>
    <h1>Add Admin</h1>
    <br><br>

    <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>

    <form action="" method="post">
        <table class="tbl-30">
            <tr>
                <td>Full name</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>
            <tr>
                <td>User name</td>
                <td><input type="text" name="username" placeholder="your username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Enter Your password"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td><input type="submit" name="submit" value="Add admin" class="btn-secondary"></td>
            </tr>
        </table>
    </form>

</div>

<?php include('partials/footer.php') ?>


<?php
//process the value form and save the data in the database
//check whether the submit button clicked or not
if(isset($_POST['submit']))
{
    //button clicked
    // echo "Button clicked";
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);//passwored encription with md5

    //sql query to save the data into database
    $sql="INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'";

    
    //executing query and saving data into the database
    $res=mysqli_query($conn,$sql) or die(mysqli_error());

    //check whether the (query is executed ) data is inserted ot not and display appropriate message
    if($res==TRUE)
    {
        // echo"data inserted";
        //create a session variable to display message
        $_SESSION['add']="<div class='add'>Admin Added Successfully</div>";
        //redirect page manage admin page
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        // echo"failed to insert the data";
        $_SESSION['add']='failed to add admin';
        header("location:".SITEURL.'admin/add-admin.php');


    }
}
?>