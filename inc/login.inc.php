<?php
session_start();
include_once '../helpers/database.php';

if(isset($_POST['submit'])){
	$userName = trim(mysqli_real_escape_string($conn,$_POST['user_name']));
	$password = trim(mysqli_real_escape_string($conn,$_POST['user_password']));
	if(empty($userName)||empty($password)){
		header('location:../login.php?msg=User+name+or+password+empty&user_name='.$userName.'&password='.$password);
		exit();
	}else{
		$sql = 'select * from users where user_name="'.$userName.'" or email="'.$userName.'"';
		$user = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($user);
		if($num_rows<1){
			header('location:../login.php?msg=User+not+found&user_name='.$userName.'&password='.$password);
			exit();
		}else{
			if($row=mysqli_fetch_assoc($user)){
				$hash = $row['user_password'];
				if(password_verify($password,$hash)){
					$_SESSION['id'] = $row['id'];
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['user_type'] = $row['user_type'];
					header('location:../index.php?msg=Login+Successful');
				}else{
					header('location:../login.php?msg=Password+did+not+match&user_name='.$userName.'&password='.$password);
					exit();
				}
			}else{
				die('Database Error');
			}
		}
	}
}else{
	header('location:../login.php?msg=Get+the+hell+out');
}
