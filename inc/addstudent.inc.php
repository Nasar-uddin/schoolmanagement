<?php
session_start();
include_once '../helpers/database.php';
include_once '../helpers/helpers.php';
if(!isLogin() && !isAdmin()){
    header('location:'.URLROOT);
    exit();
}else{
    if(isset($_POST['submit'])){

        $full_name = trim(mysqli_real_escape_string($conn,$_POST['full_name']));
        $class = trim(mysqli_real_escape_string($conn,$_POST['class']));
        $roll = trim(mysqli_real_escape_string($conn,$_POST['roll']));
        $section = trim(mysqli_real_escape_string($conn,$_POST['section']));
        $mobile = trim(mysqli_real_escape_string($conn,$_POST['mobile']));
        $father_name = trim(mysqli_real_escape_string($conn,$_POST['father_name']));
        $mother_name = trim(mysqli_real_escape_string($conn,$_POST['mother_name']));
        $address = trim(mysqli_real_escape_string($conn,$_POST['address']));

        // Check for empty fields

        if(empty($full_name)||empty($class)||empty($roll)||empty($section)||empty($mobile)||empty($father_name)||empty($mother_name)||empty($address)){
            header('location:'.URLROOT.'/addstudent.php?msg=Field+empty');
        }else{
            //if all field was filled add student and parents

            $addstudent = 'INSERT INTO students(full_name,class,roll,section) VALUES("'.$full_name.'","'.$class.'",'.$roll.',"'.$section.'")';
            if(mysqli_query($conn,$addstudent)){
                $student_id = mysqli_insert_id($conn);
                
                $addparent = "INSERT INTO parents (student_id, father,mother, address,mobile) VALUES ('$student_id', '$father_name', '$mother_name', '$address', '$mobile')";
                if(mysqli_query($conn,$addparent)){
                    header('location:'.URLROOT.'/students.php?msg=Student+Added');
                }else{
                    die("Database error 2");
                }
            }else{
                die("Database error 1");
            }
        }
    }else{
        header('location:'.URLROOT.'/addstudent.php');
    }
}