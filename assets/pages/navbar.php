<?php global $user; ?>


<nav class="new-navbar">

    <div class="navbar-brand">
        <a class="navbar-logo" href="?">
            <img src="assets/images/rbdInsta.png" alt="" height="28">
        </a>

    </div>
    <div class="navbar-items">

        <ul class="navbar-all-items">

            <li class="nav-item">
                <a class="nav-link text-dark" href="?"><i class="bi bi-house-door-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#addpost" href="#"><i class="bi bi-plus-square-fill"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="offcanvas" href="#message_sidebar" href="#"><i class="bi bi-chat-right-dots-fill"></i> <span class="un-count position-absolute start-10 translate-middle badge p-1 rounded-pill bg-danger" id="msgcounter"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/profile/<?= $user['profile_pic'] ?>" alt="" height="25" width="25" class="rounded-circle border">
                </a>
                <ul class="dropdown-menu position-absolute top-97 end-200" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?u=<?= $user['username'] ?>"><i class="bi bi-person-circle me-3"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="?editprofile"><i class="bi bi-pencil-fill me-3"></i>Edit Profile</a></li>
                    <li><a class="dropdown-item display-flex" href="#"><i class="bi bi-gear me-3"></i>Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="assets/php/actions.php?logout"><i class="bi bi-box-arrow-in-left"></i>Logout</a></li>
                </ul>
            </li>

        </ul>
        <button id="instaTV">insta TV</button>


    </div>
</nav>

<div id="side-Navigation">
    <div class="side-row">
        <div class="side-col">
            <div class="side-feature-img">
                <img class="side-img1" src="assets/images/feature.jpg" alt="">
                <img src="assets/images/play.png" class="play-btn" onclick="playVideo('assets/videos/1.mp4')">
            </div>
        </div>
    </div>
    <div class="side-column">
        <div class="small-img-row">
            <div class="small-img">
                <img class="side-img2" src="assets/images/feature2.jpg" alt="">
                <img src="assets/images/play.png" class="play-btn" onclick="playVideo('assets/videos/2.mp4')">
            </div>
        </div>
        <div class="small-img-row">
            <div class="small-img">
                <img class="side-img2" src="assets/images/feature3.jpg" alt="">
                <img src="assets/images/play.png" class="play-btn" onclick="playVideo('assets/videos/3.mp4')">
            </div>

        </div>

    </div>


</div>
<div class="video-player" id="videoPlayer">
    <video width="100%" controls id="myVideo">
        <source src="assets/videos/1.mp4" type="video/mp4">
    </video>
    <img src="assets/images/close.png" class="close-btn" onclick="stopVideo()">
</div>