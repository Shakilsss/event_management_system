<?php 
    session_start();
    if(!$_SESSION['user_id']){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">    
<?php include('includes/head.php');
?>
<body data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <?php include('includes/navbar.php');?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <?php include('includes/item1.php');?>
                <?php include('includes/item2.php');?>
                <?php include('includes/item3.php');?>
                <?php include('includes/item4.php');?>
            </main>
        </div>
    </div>
    <?php include('includes/js.php');?>
</body>
</html>