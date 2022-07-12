<?php

if (isset($_SESSION['forgot_code']) && !isset($_SESSION['auth_temp'])) {
    $action = "verifycode";
} else if (isset($_SESSION['forgot_code']) && isset($_SESSION['auth_temp'])) {
    $action = "changepassword";
} else {
    $action = "forgotpassword";
}

?>


<section id="anim-background">
    <div class="anim-color"></div>
    <div class="anim-color"></div>
    <div class="anim-color"></div>
    <div class="anim-box">
        <div class="anim-square" style="--i:0;"></div>
        <div class="anim-square" style="--i:1;"></div>
        <div class="anim-square" style="--i:2;"></div>
        <div class="anim-square" style="--i:3;"></div>
        <div class="anim-square" style="--i:4;"></div>

        <div class="anim-container">
            <div class="anim-form">


                <form method="post" action="assets/php/actions.php?<?= $action; ?>">
                    <div class="d-flex justify-content-center">


                    </div>

                    <?php
                    if ($action == "forgotpassword") {

                    ?>
                        <div class="anim-logo-background">
                            <h1 class="anim-logo" style="font-size: 25px;">Forgot Your Password ?</h1>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" class="form-control rounded-0" placeholder="Enter your Username/Email">
                        </div>
                        <?php echo showerror('email');  ?>
                        <br>
                        <button class="btn btn-primary" type="submit">Send Verification Code</button>
                    <?php
                    }
                    ?>

                    <?php
                    if ($action == "verifycode") {
                    ?>
                        <div class="anim-logo-background">
                            <h1 class="anim-logo" style="font-size: 30px;">Verify Your Email</h1>
                        </div>
                        <p>Enter 6 Digit Code Sended to You <?= $_SESSION['forgot_email'] ?></p>
                        <div class="form-floating mt-1">

                            <input type="text" name="code" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">######</label>
                        </div>
                        <?php echo showerror('email_verify');  ?>
                        <br>
                        <button class="btn btn-primary" type="submit">Verify Code</button>
                    <?php
                    }
                    ?>


                    <?php
                    if ($action == "changepassword") {
                    ?>
                        <div class="anim-logo-background">
                            <h1 class="anim-logo" style="font-size: 25px;">Enter New Password</h1>
                            <p><?= $_SESSION['forgot_email'] ?></p>
                        </div>
                        
                        <div class="form-floating mt-1">
                            <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">new password</label>
                        </div>
                        <br>
                        <?php echo showerror('password');  ?>
                        <button class="btn btn-primary" type="submit">Change Password</button>

                    <?php
                    }
                    ?>

                    <br>
                    <br>
                    <a href="?login" class="text-decoration-none mt-5"><i class="bi bi-arrow-left-circle-fill"></i> Go Back
                        To
                        Login</a>
                </form>

            </div>
        </div>
    </div>
</section>




</div>
</div>