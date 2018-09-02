<?php
include_once 'partial/header.php';

$posts = [];
if(!isLogin()){
    header('location:'.URLROOT);
    exit();
}
$user_id = $_SESSION['id'];
$sql = 'select * from posts where user_id='.$user_id.' ORDER BY post_time DESC';
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $posts = mysqli_fetch_all($result);
}
?>
<div class="row">
    <?php if(isset($_GET['msg'])){?>
    <div class="container">
        <div class="col s12 red">
            <h4 class="white-text center-align"><?php echo $_GET['msg']; ?></h4>
        </div>
    </div>
    <?php }?>
    <div class="col s12">
    <a href="<?php echo URLROOT;?>" class="btn red mt2"><i class="material-icons">fast_rewind</i> <i class="material-icons">home</i></a>
    </div>
    <div class="col m3 s6">
        <aside class="collection with-header">
            <h4 class="collection-header">Dashbord</h4>
            <a href="dashbord.php" class="collection-item active">Posts</a>
            <a href="addpost.php" class="collection-item">Add posts</a>
            <a href="students.php" class="collection-item">Students</a>
            <a href="addstudent.php" class="collection-item">Add new students</a>
        </aside>
    </div>
    <div class="col m9 s6">
        <ul class="collection">
        <?php foreach($posts as $post){?>
            <li class="collection-item">
                <span class="red-text"><?php echo $post[0];?></span>. <?php echo $post[1];?>
                <div class="secondary-content">
                    <a href="<?php echo URLROOT."/editpost.php?id=".$post[0];?>" class="btn green lighten-1">Edit</a>
                    <a href="<?php echo URLROOT."/inc/delete.inc.php?post_id=".$post[0];?>" class="btn red lighten-1">Delete</a>
                </div>
            </li>
        <?php }?>
        </ul>
    </div>
</div>

<?php include_once 'partial/footer.php'; ?>
