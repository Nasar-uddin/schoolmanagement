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
            <a href="addpost.php" class="collection-item">Add posts</a>
            <a href="students.php" class="collection-item">Students</a>
            <a href="addstudent.php" class="collection-item active">Add new students</a>
        </aside>
        </div>
        <div class="col s9">
            <form action="inc/addstudent.inc.php" method="post" class="col s12">
                <div class="input-field col s12">
                    <input type="text" name="full_name" value="">
                    <label for="full_name">Student Name</label>
                </div>
                <div class="input-field col s6">
                    <select name="class">
                        <option value="" disabled selected>Choose class</option>
                        <option value="6">Six</option>
                        <option value="7">Seven</option>
                        <option value="8">Eight</option>
                        <option value="9">Nine</option>
                        <option value="10">Ten</option>
                    </select>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="roll" value="">
                    <label for="roll">Student Roll no</label>
                </div>
                <div class="input-field col s6">
                    <select name="section">
                        <option value="" disabled selected>Choose section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="B">C</option>
                    </select>
                </div>
                <div class="input-field col s6">
                    <input type="text" name="mobile" value="">
                    <label for="name">Mobile number</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="father_name" value="">
                    <label for="name">Father's Name</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="mother_name" value="">
                    <label for="name">Mother's Name</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="address" value="">
                    <label for="name">Address</label>
                </div>
                <button class="btn waves-effect" type="submit" name="submit">Add Student</button>
            </form>
        </div>
    </div>

<?php include_once 'partial/footer.php'; ?>