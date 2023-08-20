<?php
require_once('./admin-component/db.php');
if(isset($_POST['admin-login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    if($pass == '123' && $user == '123'){
        $_SESSION['user']['user'] = $user;
        $_SESSION['user']['password'] = $pass;
        header('location:./admin.php');
    }else{
        $message = 'Incorrect username or password';
        header('location:./admin-login.php?message='.$message);
        
    }

    
}
$message = $_GET['message'] ?? '';
require_once('./admin-component/admin-head.php');
?>
<div class="section pt-5">

    <form class="mt-5 border border-grey bg-light p-4 rounded" style="max-width: 500px;margin:auto;" method='POST' action='./admin-login.php'>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your username...">
            <small id="emailHelp" class="form-text text-muted">Provide your username.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" name="admin-login" class="btn btn-primary">Submit</button>
        <?php if($message != ''){
            ?>
            <br>
            <br>
                <p class="p3 m3 text-danger"><?php echo $message;?></p>
            <?php 
        }
    ?></form>
    </div>
    <?php
require_once('./admin-component/admin-footer.php');
 ?>
