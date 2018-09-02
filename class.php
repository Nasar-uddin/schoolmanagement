<?php 
include_once 'partial/header.php';
include_once 'partial/navbar.php';
$class = "";
$students = [];

if(isset($_GET['class'])){
    $class = $_GET['class'];
}else{
    header("location:".URLROOT);
}
$sql = "SELECT * FROM students where class=$class ORDER BY roll";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $students = mysqli_fetch_all($result);
}
?>

<div class="container">

    <div class="row">
        <div class="col s12">
            <a href="<?php echo URLROOT;?>" class="btn red mt2"><i class="material-icons">fast_rewind</i> <i class="material-icons">home</i></a>
        </div>
        <div class="col s12">
            <h2>All students of class <?php echo $class;?></h2>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $one){?>
                        <tr>
                            <td><?php echo $one[1];?></td>
                            <td><?php echo $one[3];?></td>
                            <td><?php echo $one[4];?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<?php include_once 'partial/footer.php';?>