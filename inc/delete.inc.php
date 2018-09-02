<?php
session_start();
include_once '../helpers/helpers.php';
include_once '../helpers/database.php';
if (!isLogin()){
    header("location:../index.php");
}else{
    if(!isAdmin()){
        header("location:../index.php");
    }else{
        $id = $_GET['post_id'];
        $sql = 'DELETE FROM posts where id='.$id;
        if(mysqli_query($conn,$sql)){
            header('location:../dashbord.php?msg=Post+deleted');
        }else{
            header('location:../dashbord.php?msg=Post+didn\'t+deleted');
        }
    }
}
