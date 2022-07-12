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
                <div class="anim-logo-background">
                    <h1 class="anim-logo">RBDINSTA</h1>
                </div>

                <h1 class="">Please sign in</h1>
                <form method="POST" action="assets/php/actions.php?login">

                    <div class="inputBox">
                        <input type="text" name="username_email" value="<?php echo showFormData('username_email'); ?>" ; class="form-control rounded-0" placeholder="username/email">
                    </div>
                    <?php echo showerror('username_email');  ?>

                    <div class="inputBox">
                        <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    </div>
                    <?php echo showerror('password');  ?>
                    <?php echo showerror('checkUser');  ?>

                    <div class="inputBox">
                        <button class="btn btn-primary" type="submit">Sign in</button>
                        <a href="?signup" class="text-decoration-none">Create New Account</a>
                    </div>
                    <a href="?forgotpassword&newFp" class="anim-forget">Forgot password ?</a>
                </form>
            </div>
        </div>
    </div>
</section>