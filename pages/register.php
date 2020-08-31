<?php include_once('../lib/lib.php'); ?>
<?php
    if (isset($_POST['action'])) {
        include_once('../lib/server.php');
    }
?>
<script>
    const Email = /[a-z0-9._%]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const Name = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const Password = /[a-zA-Z0-9]{4,}/;

    function refresh_captcha() {
        document.getElementById("capt_img").src = "captcha.php?waste=" + Math.random();
    }

    const Check = () => {
        let email = $('#input-email').val();
        let name = $('#input-name').val();
        let password = $('#input-password').val();

        if(!Email.test(email) === true){
            alert('이메일 형식을 맞춰주세요.');
        }
        else if(!Name.test(name) === true) {
            alert('한국어 이름을 입력해 주세요.');
        }
        else if(!Password.test(password) === true) {
            alert('비밀번호는 영문 및 숫자이며 4글자 이상이어야 합니다.');
        }
    }
</script>
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
        <p class="page-not"> Already a member? <a href="login.php">Sign in</a></p>
    </form>
</div>
<?php endif;?>


<script>
    const checkForm = () => {
        let captcha = $("#captcha").val();
        if( ! captcha ) {
            alert("캡차는 필수항목입니다.");
            return false;
        }
        if( $("#captchaOk").val() !== "yes" ) {
            alert("캡차가 일치하지 않습니다.");
            return false;
        }
    }

    let checkCaptcha = () => {
        let captcha = $("#captcha").val();
        let send_data = {};
        send_data.action = "checkcaptcha";
        send_data.captcha = captcha;
        $.post("../lib/action.php", send_data, function(result){
            let res = $.parseJSON(result);
            if( res.success ) $("#captchaOk").val("yes");
            else $("#captchaOk").val("no");
        });
    }
</script>
<?php include_once('footer.php');?>