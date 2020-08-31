<?php include_once('../lib/lib.php');?>
<?php include_once('header.php');?>
<?php if( $login ):?>
    <?php include_once('ready.php');?>
<?php else: ?>
<div class="page-area">
    <h1 class="page-title">Login</h1>

    <form method="post" action="login_check.php">
        <div class="text-group">
            <label>Id(Email)</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="text-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="page-btn">Login</button>
        <p class="page-not">Not yet a member? <a href="register.php">Sign up</a></p>
    </form>
</div>
<?php endif;?>
<?php include_once('footer.php');?>