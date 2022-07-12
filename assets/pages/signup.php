<!-- <div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            
        </div>
    </div> -->


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

                <h1 class="">Create new account</h1>

                <form method="POST" action="assets/php/actions.php?signup">
                    <!-- <div class="d-flex justify-content-center">

                    <img class="mb-4" src="assets/images/rbdInsta.png" alt="" height="45">
                </div> -->
                    <!-- <h1 class="h5 mb-3 fw-normal">Create new account</h1> -->
                  
                        <div class="inputBox">
                            <input type="text" name="first_name" value="<?php echo showFormData('first_name'); ?>" class="form-control rounded-0" placeholder="First Name">
                            <!-- <label for="floatingInput">first name</label> -->
                        </div>
                        <?php echo showerror('first_name');  ?>
                        <div class="inputBox">
                            <input type="text" name="last_name" value="<?php echo showFormData('last_name'); ?>" class="form-control rounded-0" placeholder="Last Name">
                            <!-- <label for="floatingInput">last name</label> -->
                        </div>
                    
                    <?php echo showerror('last_name');  ?>
                    <div class="d-flex gap-3 my-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="1" <?php echo isset($_SESSION['formdata']) ? '' : 'checked'; ?> <?php echo showFormData('gender') == 1 ? 'checked' : '';  ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="2" <?php echo showFormData('gender') == 2 ? 'checked' : '';  ?>>
                            <label class="form-check-label" for="exampleRadios3">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="0" <?php echo showFormData('gender') == 0 ? 'checked' : '';  ?>>
                            <label class="form-check-label" for="exampleRadios2">
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" value="<?php echo showFormData('email'); ?>" class="form-control rounded-0" placeholder="email">
                        <!-- <label for="floatingInput">email</label> -->
                    </div>
                    <?php echo showerror('email');  ?>
                    <div class="inputBox">
                        <input type="text" name="username" value="<?php echo showFormData('username'); ?>" class="form-control rounded-0" placeholder="username">
                        <!-- <label for="floatingInput">username</label> -->
                    </div>
                    <?php echo showerror('username');  ?>
                    <div class="inputBox">
                        <input type="password" name="password" value="" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                        <!-- <label for="floatingPassword">password</label> -->
                    </div>
                    <?php echo showerror('password');  ?>

                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary" type="submit">Sign Up</button>

                    </div>
                    <a href="?login" class="text-decoration-none" style="margin:0 auto;">Already have an account ?</a>

                </form>




            </div>
        </div>
    </div>
</section>