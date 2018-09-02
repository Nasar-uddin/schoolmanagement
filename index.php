<?php include_once 'partial/header.php';
include_once 'partial/navbar.php';

//This is for pagination

$postnum = 5;
$posts = [];
$pagenum = isset($_GET['page'])?$_GET['page']:1;
$totalpost = 'SELECT COUNT(id) as total FROM posts';
$tp = mysqli_query($conn,$totalpost);
$total = mysqli_fetch_assoc($tp);

// ---------------------

$sql = 'SELECT posts.id,posts.user_id,posts.post_title,users.full_name FROM posts,users WHERE posts.user_id=users.id ORDER BY post_time DESC LIMIT '.(($pagenum-1)*$postnum).','.$postnum;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $posts = mysqli_fetch_all($result);
}
?>
<?php if(!empty($_GET['msg'])){?>
    <div class="container">
        <div class="row">
            <div class="card-panel green darken-2">
                <h5 class="white-text"><?php echo $_GET['msg'];?></h5>
            </div>
        </div>
    </div>
<?php }?>
<div class="row">
    <div class="carousel carousel-slider">
        <a href="#one!" class="carousel-item">
            <img src="./images/01.jpg" alt="">
            <div class="carousel-fixed-item center-align white-text">
                <h1>Beautiful environment</h1>
            </div>
        </a>
        <a href="#two!" class="carousel-item">
            <img src="./images/02.jpg" alt="">
            <div class="carousel-fixed-item center-align white-text">
                <h1>Better place to grow up</h1>
            </div>
        </a>
        <a href="#three!" class="carousel-item">
            <img src="./images/03.jpg" alt="">
            <div class="carousel-fixed-item center-align white-text">
                <h1>Better Education</h1>
            </div>
        </a>
    </div>
</div>
<div class="container">
    <div class="row">

        <div class="col s12">
        <h3 class="center-align">Recent posts</h3>

        <ul class="collection">
            <?php foreach($posts as $post){?>
            <li class="collection-item">
                <h3><?php echo $post[2]; ?></h3>
                <p>By <b><?php echo $post[3];?></b></p>
                <a href="details.php?<?php echo 'postid='.$post[0];?>" class="btn teal waves-effect">Details</a>
            </li>
            <?php }?>
        </ul>
        <ul class="pagination">
        <?php
            $totalPage = ceil($total['total']/$postnum);
            for($i=1;$i<=$totalPage;$i++){
        ?>
            <li class="waves-effect <?php if($i==$pagenum) echo "active"; ?>"><a href="<?php echo URLROOT."?page=".$i;?>"><?php echo $i;?></a></li>
            <?php }?>
        </ul>
        </div>
    </div>
</div>

<?php include_once 'partial/footer.php'; ?>
