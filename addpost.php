<?php
include_once 'partial/header.php';
$posts = [];
if(!isLogin() && !isAdmin()){
    header('location:'.URLROOT);
    exit();
}
?>
    <div class="row">
        <div class="col s12">
            <a href="<?php echo URLROOT;?>" class="btn red mt2"><i class="material-icons">fast_rewind</i> <i class="material-icons">home</i></a>
        </div>
        <?php if(!empty($_GET['msg'])){?>
        <div class="col s12">
            <div class="card-panel red">
                <h5 class="white-text"><?php echo $_GET['msg'];?></h5>
            </div>
        </div>
        <?php }?>
        <div class="col m3 s6">
        <aside class="collection with-header">
            <h4 class="collection-header">Dashbord</h4>
            <a href="dashbord.php" class="collection-item">Posts</a>
            <a href="addpost.php" class="collection-item active">Add posts</a>
            <a href="students.php" class="collection-item">Students</a>
            <a href="addstudent.php" class="collection-item">Add new students</a>
        </aside>
        </div>
        <div class="col s9">
            <form action="inc/addpost.inc.php" method="post">
                <div>
                    <label for="">Post title</label>
                    <textarea name="post_title" rows="10" class="materialize-textarea" id="post_title"></textarea>
                    <span class="helper-text">Less than 120 latters</span>
                </div>
                <div class="mt4">
                    <label for="">Post Body</label>
                    <textarea name="post_body" rows="10" class="materialize-textarea" id="post_body"></textarea>
                </div>
                <button class="btn waves-effect" type="submit" name="submit">Add post</button>
            </form>
        </div>
    </div>

<?php include_once 'partial/footer.php'; ?>