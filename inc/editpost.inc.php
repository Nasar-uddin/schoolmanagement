<?php
session_start();
include_once "../helpers/database.php";
include_once "../helpers/helpers.php";

$post_id = $_GET['id'];
if(!isLogin() && !isAdmin()){
    header('location:'.URLROOT."?msg=Not+Admin");
    exit();
}else{
    $post_title = trim($_POST['post_title']);
    $post_body = trim($_POST['post_body']);
    $sql = "UPDATE posts SET post_title='$post_title',post_body='$post_body' WHERE id=$post_id";
    if(mysqli_query($conn,$sql)){
        header('location:'.URLROOT."/dashbord.php"."?msg=Post+updated");
    }else{
        die("Database error");
    }

}
