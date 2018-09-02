<?php include_once 'partial/header.php';
include_once 'partial/navbar.php';
$post = [];
$post_id = $_GET['postid'];
$sql = 'SELECT * FROM posts WHERE id='.$post_id;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $post = mysqli_fetch_assoc($result);
}
?>
<div class="container">

    <div class="row">
        <div class="col s12">
            <a href="<?php echo URLROOT;?>" class="btn red mt2"><i class="material-icons">fast_rewind</i> <i class="material-icons">home</i></a>
        </div>
        <div class="col s12">
            <h3><?php echo $post['post_title']; ?></h3>
            <p><?php echo $post['post_body']; ?></p>
            <p class="right-align">At <b><?php echo $post['post_time'];?></b></p>
        </div>
    </div>

</div>

<?php include_once 'partial/footer.php';?>