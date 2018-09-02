<?php 
include_once 'partial/header.php';
include_once 'partial/navbar.php'; 
if(isLogin() && !isAdmin()){
    header('location:'.URLROOT);
    exit();
}
    $post_id = $_GET['id'];
    $post = [];
    $sql = "SELECT id,post_title,post_body FROM posts where id=$post_id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $post = mysqli_fetch_assoc($result);
    }else{
        die("Databse error");
    }
?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card-panel center-align">
				<h3>Edit your post</h3>
			</div>
		</div>
		<div class="col s12">
            <form action="inc/editpost.inc.php?id=<?php echo $post_id;?>" method="post">
                <div>
                    <label for="">Post title</label>
                    <textarea name="post_title" rows="10" class="materialize-textarea" id="post_title"><?php echo $post['post_title']; ?></textarea>
                    <span class="helper-text">Less than 120 latters</span>
                </div>
                <div class="mt4">
                    <label for="">Post Body</label>
                    <textarea name="post_body" rows="10" class="materialize-textarea" id="post_body"><?php echo $post['post_body']; ?></textarea>
                </div>
                <button class="btn waves-effect" type="submit" name="submit">Update post</button>
            </form>
        </div>
	</div>
</div>


<?php include_once 'partial/footer.php'; ?>