<?php global $user; ?>


<nav class="new-navbar navbar navbar-expand-lg navbar-light bg-white border">
    <div class="container col-lg-9 col-sm-12 col-md-10 d-flex flex-lg-row flex-md-row flex-sm-column justify-content-between">
        <div class="d-flex justify-content-between col-lg-8 col-sm-12">
            <a class="navbar-brand" href="?">
                <img src="assets/images/rbdInsta.png" alt="" height="28">
            </a>

            <form class="d-flex" id="searchform">
                <input style="height:32px; background-color: #fafafa;" class="form-control   me-1" type="search" placeholder="looking for someone.." aria-label="Search">

            </form>

        </div>


        <ul class="navbar-nav flex-fill flex-row justify-content-evenly mb-lg-1 mb-md-0">

            <li class="nav-item">
                <a class="nav-link text-dark" href="?"><i class="bi bi-house-door-fill"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="modal" data-bs-target="#addpost" href="#"><i class="bi bi-plus-square-fill"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" data-bs-toggle="offcanvas" href="#message_sidebar" href="#"><i class="bi bi-chat-right-dots-fill"></i> <span class="un-count position-absolute start-10 translate-middle badge p-1 rounded-pill bg-danger" id="msgcounter"></span> </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/profile/<?= $user['profile_pic'] ?>" alt="" height="25" width="25" class="rounded-circle border">
                </a>
                <ul class="dropdown-menu position-absolute top-100 end-50" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="?u=<?=$user['username']?>"><i class="bi bi-person-circle me-3"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="?editprofile"><i class="bi bi-pencil-fill me-3"></i>Edit Profile</a></li>
                    <li><a class="dropdown-item display-flex" href="#"><i class="bi bi-gear me-3"></i>Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="assets/php/actions.php?logout"><i class="bi bi-box-arrow-in-left"></i>Logout</a></li>
                </ul>
            </li>

        </ul>


    </div>
</nav>