<?php include_once('../lib/lib.php'); ?>
<?php
    if (isset($_POST['action'])) {
        include_once('../lib/server.php');
    }
?>
<?php include_once('header.php');?>

<?php if( $login ):?>
    <?php include_once('ready.php');?>
<?php else: ?>
<div class="page-area">
    <h1 class="page-title">Register</h1>

    <form method="post" action="" onsubmit="return checkForm();">
        <input type="hidden" name="action" value="register">
        <div class="text-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" id="input-name" required>
        </div>
        <div class="text-group">
            <label>id(Email)</label>
            <input type="email" name="email" class="form-control" id="input-email" required>
        </div>
        <div class="text-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="input-password" required>
        </div>
        <div class="text-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" class="form-control" required>
        </div>
        <div class="text-group">
            <label>age</label>
            <input type="text" name="age" class="form-control" required>
        </div>
        <div class="select-group">
            <label>gender</label>
            <input type="radio" class="gen" name="gender" value="male" required> Male
            <input type="radio" class="gen" name="gender" value="female" required> Female
        </div>
        <div class="select-group">
            <label>school</label>
            <input type="radio" class="gen" name="school" value="초등학교" required> 초등학교
            <input type="radio" class="gen" name="school" value="중학교" required> 중학교
            <input type="radio" class="gen" name="school" value="고등학교" required> 고등학교
        </div>
        <div class="text-group">
            <img src="captcha.php" alt="captcha" title="captcha" id="capt_img">
            <input type="text" name="captcha" id="captcha" class="form-control" onkeyup="checkCaptcha()">
            <input type="hidden" id="captchaOk" value="no">
        </div>
        <button type="submit" class="page-btn" onclick="Check();">Register</button>
        <p class="page-not"><a href="login.php">Already a member? Login</a></p>
    </form>
</div>
<?php endif;?>

<?php include_once('footer.php');?>