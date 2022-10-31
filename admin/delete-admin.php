<?php 
    include('../config/constants.php');
     $id=$_GET['id'];
     $sql="DELETE FROM tbl_admin where id=$id";
     //execute the query
     $res=mysqli_query($conn,$sql);
     if($res==true)
     {
        $_SESSION['delete']="<div class='success'>admin deleted succesfully<div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }else
     {
        $_SESSION['delete']="<div class='error'>failed to delete admin<div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
?>