<?php
include_once 'partial/header.php';

if(!isLogin() && !isAdmin()){
    header('location:'.URLROOT);
    exit();
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
            <a href="dashbord.php" class="collection-item">Posts</a>
            <a href="addpost.php" class="collection-item">Add posts</a>
            <a href="students.php" class="collection-item active">Students</a>
            <a href="addstudent.php" class="collection-item">Add new students</a>
        </aside>
    </div>
    <div class="col m9 s6">
        <?php 
            $classes = [];
            $sql = "SELECT class,COUNT(full_name) FROM students GROUP by class ORDER by class";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $classes = mysqli_fetch_all($result);
            }
        ?>
        <ul class="collection">
        <?php foreach($classes as $class){?>
            <li class="collection-item">
                <span class="red-text">Class <?php echo $class[0];?></span>. Number of students <span class="red-text"><?php echo $class[1];?></span>
                <div class="secondary-content">
                    <a href="<?php echo URLROOT."/class?class=".$class[0];?>" class="btn green lighten-1">Show all students</a>
                </div>
            </li>
        <?php }?>
        </ul>
    </div>
</div>

<?php include_once 'partial/footer.php';?>
