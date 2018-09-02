<?php
session_start();
include_once '../helpers/database.php';
include_once '../helpers/helpers.php';
if(!isLogin() && !isAdmin()){
    header('location:'.URLROOT);
    exit();
}else{
    $post_title = trim(mysqli_real_escape_string($conn,$_POST['post_title']));
    $post_body = trim(mysqli_real_escape_string($conn,$_POST['post_body']));
    $user_id = $_SESSION['id'];
    if(empty($post_title)&&empty($post_body)){
        header('location:'.URLROOT.'/addpost.php?msg=Empty+field');
    }else{
        $sql = 'INSERT into posts(post_title,post_body,user_id) VALUES("'.$post_title.'","'.$post_body.'",'.$user_id.');';
        if(mysqli_query($conn,$sql)){
            header('location:'.URLROOT.'/addpost.php?msg=Post+added');
            exit();
        }else{
            header('location:'.URLROOT.'/addpost.php?msg=Post+didn\'t+added');
            exit();
        }
    }
}
