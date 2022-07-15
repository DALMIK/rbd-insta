<?php
global $profile;
global $profile_post;
global $user;


?>


<div class="container mt-8 col-md-9 col-sm-11 rounded-0">
    <div class="col-12 rounded p-4 m-4 d-flex gap-5">
        <div id="profile-image" class=" col-md-4 col-sm-12 d-flex justify-content-center mx-auto align-items-start">

            <img src="assets/images/profile/<?= $profile['profile_pic'] ?>" class="img-thumbnail rounded-circle my-3" style="height:150px; width:150px" alt="...">
        </div>
        <div class="col-md-8 col-sm-11 mt-4">
            <div class="d-flex flex-column">
                <div class="d-flex gap-5 align-items-center">
                    <span style="font-size: x-large;"><?= $profile['first_name'] ?> <?= $profile['last_name'] ?></span>

                </div>
                <span style="font-size: larger;" class="text-secondary">@<?= $profile['username'] ?></span>
                <div class="d-flex gap-2 align-items-center my-3">

                    <a class="text-dark text-decoration-none me-3"><strong><?= count($profile_post); ?></strong> Posts</a>
                    <a class="text-dark text-decoration-none me-4" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#follower_list"><strong><?= count($profile['followers']); ?></strong> Followers</a>
                    <a class="text-dark text-decoration-none" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#following_list"><strong><?= count($profile['following']); ?></strong> Following</a>


                </div>

                <?php

                if ($user['id'] != $profile['id']) {

                ?>
                    <div class="d-flex gap-2 align-items-center my-1">
                        <?php

                        if (checkFollowStatus($profile['id'])) {
                        ?>
                            <button class="btn btn-sm btn-danger unfollowbtn" data-user-id="<?= $profile['id'] ?>">Unfollow</button>

                        <?php
                        } else {
                        ?>
                            <button class="btn btn-sm btn-primary followbtn" data-user-id="<?= $profile['id'] ?>">Follow</button>
                        <?php
                        }

                        ?>
                        <button style="width: 100px;" class="bg-transparent border rounded mx-2 py-1" href="#" data-bs-toggle="modal" data-bs-target="#chatbox" onclick="popchat(<?= $profile['id'] ?>)"><i class=""></i>Message</button>

                    </div>

                <?php
                }

                ?>


            </div>
        </div>


    </div>

    <h5 class="border-bottom">Posts</h5>

    <?php
    if (count($profile_post) < 1) {
        echo "<p class= 'p-2 bg-white border rounded text-center my-3'>You Don't have any post</p>";
    }
    ?>
    <div class="gallery d-flex flex-wrap justify-content-center justify gap-2 mb-4">
        <?php
        foreach ($profile_post as $post) {
        ?>
            <img src="assets/images/posts/<?= $post['post_img'] ?>" data-bs-toggle="modal" data-bs-target="#postview<?= $post['id'] ?>" width="300px" class="rounded" />

            <!-- Modal -->
            <div class="modal fade" id="postview<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body d-flex p-0">
                            <div class="col-md-8 col-sm-12">
                                <img src="assets/images/posts/<?= $post['post_img'] ?>" style="max-height:90vh" class="w-100 rounded-start">
                            </div>



                            <div class="col-md-4 col-sm-12 d-flex flex-column">
                                <div class="d-flex align-items-center p-2 <?= $post['post_text'] ? '' : 'border-bottom' ?>">
                                    <div><img src="assets/images/profile/<?= $profile['profile_pic'] ?>" alt="" width="50" height="50" class="rounded-circle border">
                                    </div>
                                    <div>&nbsp;&nbsp;&nbsp;</div>
                                    <div class="d-flex flex-column justify-content-start align-items-center">
                                        <h6 style="margin: 0px;"><?= $profile['first_name'] ?> <?= $profile['last_name'] ?></h6>
                                        <p style="margin:0px;" class="text-muted">@<?= $profile['username'] ?></p>
                                    </div>
                                </div>


                                <div class="flex-fill align-self-stretch overflow-auto" id="comment-section<?= $post['id'] ?>" style="height: 100px;">

                                    <?php

                                    $comments = getComments($post['id']);

                                    if (count($comments) < 1) {
                                    ?>

                                        <p class="p-3 text-center my-2 nce">No comments!!!</p>

                                    <?php
                                    }

                                    foreach ($comments as $comment) {
                                        $cuser = getUser($comment['user_id']);
                                    ?>

                                        <div class="d-flex align-items-center p-2">
                                            <div><img src="assets/images/profile/<?= $cuser['profile_pic'] ?>" alt="" height="40" width="40" class="rounded-circle border">
                                            </div>
                                            <div>&nbsp;&nbsp;&nbsp;</div>
                                            <div class="d-flex flex-column justify-content-start align-items-start">
                                                <h6 style="margin: 0px;"><a href="?u=<?= $cuser['username'] ?>" class="text-decoration-none text-dark">@<?= $cuser['username'] ?></a> </h6>
                                                <p style="margin:0px;" class="text-muted"><?= $comment['comment'] ?></p>
                                            </div>
                                        </div>

                                    <?php
                                    }


                                    ?>






                                </div>
                                <div class="input-group p-2 border-top">
                                    <input type="text" class="form-control rounded-0 border-0 comment-input" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-cs="comment-section<?= $post['id'] ?>" data-post-id="<?= $post['id'] ?>" type="button" id="button-addon2">Post</button>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>




</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->



<!-- Modal for follower list-->
<div class="modal fade" id="follower_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Followers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                foreach ($profile['followers'] as $f) {
                    $fuser = getUser($f['follower_id']);
                    $fbtn = '';
                    if (checkFollowStatus($f['follower_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id=' . $fuser['id'] . '>unfollow</button>';
                    } else if ($user['id'] == $f['follower_id']) {
                        $fbtn = '';
                    } else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id=' . $fuser['id'] . '>follow</button>';
                    }
                ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center p-2">
                            <div><img src="assets/images/profile/<?= $fuser['profile_pic']; ?>" alt="" height="40" width="40" class="rounded-circle border">
                            </div>
                            <div>&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-center">
                                <a href="?u=<?= $fuser['username'] ?>" class="text-decoration-none text-dark">
                                    <h6 style="margin: 0px;font-size: small;"><?= $fuser['first_name']; ?> <?= $fuser['last_name']; ?></h6>
                                </a>
                                <p style="margin:0px;font-size:small" class="text-muted">@<?= $fuser['username']; ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <?= $fbtn; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>




<!-- Modal for following list-->
<div class="modal fade" id="following_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Following</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                foreach ($profile['following'] as $f) {
                    $fuser = getUser($f['user_id']);
                    $fbtn = '';
                    if (checkFollowStatus($f['user_id'])) {
                        $fbtn = '<button class="btn btn-sm btn-danger unfollowbtn" data-user-id=' . $fuser['id'] . '>unfollow</button>';
                    } else if ($user['id'] == $f['user_id']) {
                        $fbtn = '';
                    } else {
                        $fbtn = '<button class="btn btn-sm btn-primary followbtn" data-user-id=' . $fuser['id'] . '>follow</button>';
                    }
                ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center p-2">
                            <div><img src="assets/images/profile/<?= $fuser['profile_pic']; ?>" alt="" height="40" width="40" class="rounded-circle border">
                            </div>
                            <div>&nbsp;&nbsp;</div>
                            <div class="d-flex flex-column justify-content-center">
                                <a href="?u=<?= $fuser['username'] ?>" class="text-decoration-none text-dark">
                                    <h6 style="margin: 0px;font-size: small;"><?= $fuser['first_name']; ?> <?= $fuser['last_name']; ?></h6>
                                </a>
                                <p style="margin:0px;font-size:small" class="text-muted">@<?= $fuser['username']; ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <?= $fbtn; ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    var videoPlayer = document.getElementById("videoPlayer");
    var myVideo = document.getElementById("myVideo");



    function stopVideo() {
        videoPlayer.style.display = "none";
        myVideo.pause();
    }

    function playVideo(file) {
        myVideo.src = file;
        myVideo.play();
        videoPlayer.style.display = "block";
    }
</script>