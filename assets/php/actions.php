<?php
require_once 'functions.php';
require_once 'send_code.php';

// FOR managing signup
if (isset($_GET['signup'])) {

    $response = validateSignupForm(($_POST));

    if ($response['status']) {

        if (createUser($_POST)) {
            header('location:../../?login');
            // echo "<script>alert('User is Succefully created')</script>";
        } else {
            // header('location:../../?signup');
            echo "<script>alert('something is wrong')</script>";
        }
    } else {
        //    print_r($response);
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header('location:../../?signup');  // this ../../ will redirect to the 2 time back to index page
    }
}


// for managing login
if (isset($_GET['login'])) {

    $response = validateLoginForm(($_POST));

    if ($response['status']) {

        $_SESSION['Auth'] = true;
        $_SESSION['userdata'] = $response['user'];

        if ($response['user']['ac_status'] == 0) {
            $_SESSION['code'] = $code = rand(111111, 999999);
            $subject = "verify your email";
            sendCode($response['user']['email'], $subject, $code);
        }

        header('location:../../');
    } else {
        print_r($response);
        $_SESSION['error'] = $response;
        $_SESSION['formdata'] = $_POST;
        header('location:../../?login');  // this ../../ will redirect to the 2 time back to index page
    }
}


if (isset($_GET['resend_code'])) {
    $_SESSION['code'] = $code = rand(111111, 999999);
    $subject = "verify your email";
    sendCode($_SESSION['userdata']['email'], $subject, $code);
    header('location:../../?resended');
}


if (isset($_GET['verify_email'])) {
    $user_code = $_POST['code'];
    $code =  $_SESSION['code'];
    if ($code == $user_code) {
        if (verifyEmail($_SESSION['userdata']['email'])) {
            header('location:../../');
        } else {
            echo "Something is wrong";
        }
    } else {
        $response['msg'] = "incorrect verification code";
        if (!$_POST['code']) {
            $response['msg'] = "Enter 6 digit code";
        }
        $response['field'] = 'email_verify';
        $_SESSION['error'] = $response;
        header('location:../../');
    }
}


if (isset($_GET['forgotpassword'])) {
    if (!$_POST['email']) {
        $response['msg'] = "email your email id";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } elseif (!isEmailRegistered($_POST['email'])) {
        $response['msg'] = "email is NOT registered exist";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } else {
        $_SESSION['forgot_email'] = $_POST['email'];
        $_SESSION['forgot_code'] = $code = rand(111111, 999999);
        $subject = "Forgot your password";
        sendCode($_POST['email'], $subject, $code);
        header('location:../../?forgotpassword&resended');
    }
}


// for logout id

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:../../');
}


if (isset($_GET['verifycode'])) {
    $user_code = $_POST['code'];
    $code =  $_SESSION['forgot_code'];
    if ($code == $user_code) {
        $_SESSION['auth_temp'] = "true";
        header('location:../../?forgotpassword');
    } else {
        $response['msg'] = "incorrect verification code";
        if (!$_POST['code']) {
            $response['msg'] = "Enter 6 digit code";
        }
        $response['field'] = 'email_verify';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    }
}


if (isset($_GET['changepassword'])) {
    if (!$_POST['password']) {
        $response['msg'] = "email your new password";
        $response['field'] = 'password';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    } else {
        resetpassword($_SESSION['forgot_email'], $_POST['password']);
        header('location:../../?reseted');
    }
}


//Update profile
if(isset($_GET['updateprofile'])){


    $response = validateUpdateForm($_POST,$_FILES['profile_pic']);

    if ($response['status']) {
        // var_dump(updateProfile($_POST,$_FILES['profile_pic']));
        var_dump(updateProfile($_POST,$_FILES['profile_pic']));

        if(updateProfile($_POST,$_FILES['profile_pic'])){
            header('location:../../?editprofile&success');
        }else{
                echo "SOMETHING IS WRONG";
        }

    } else {
        $_SESSION['error'] = $response;
        header('location:../../?editprofile');  // this ../../ will redirect to the 2 time back to index page
    }
}


//   for managing add post

if(isset($_GET['addpost'])){

    $response = validatePostImage($_FILES['post_img']);
    if($response['status']){
        if(createpost($_POST,$_FILES['post_img'])){
            
            header("location:../../?new_post_added");

        }else{
            echo "something is wrong";
        }

    }else{
        $_SESSION['error'] = $response;
        header("location:../../");
    }

}

// for deleting a post 

if(isset($_GET['deletepost'])){
    $post_id = $_GET['deletepost'];
      if(deletePost($post_id)){
          header("location:{$_SERVER['HTTP_REFERER']}");
      }else{
          echo "something went wrong";
      }
  
    
  }






