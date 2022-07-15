//  for preview the post image
let input = document.querySelector("#select_post_img");
let image = document.querySelector("#post_img");
const instaTv = document.getElementById("instaTV");
const sideNav = document.getElementById("side-Navigation");

instaTv.addEventListener("click", () => {
    sideNav.classList.toggle("active");
    instaTv.classList.toggle("insta-active");
});





input.addEventListener("change", preview);

function preview() {
    let fileobject = this.files[0];
    let filereader = new FileReader();

    filereader.readAsDataURL(fileobject);

    filereader.onload = function() {
        let image_src = filereader.result;

        image.setAttribute("src", image_src);
        image.setAttribute("style", "display:");
    };
}

//for follow the user

$(".followbtn").click(function() {
    var user_id_v = $(this).data("userId");
    var button = this;
    $(button).attr("disabled", true);
    // $(this).text(user_id);

    $.ajax({
        url: "assets/php/ajax.php?follow",
        method: "post",
        datatype: "json",
        data: { user_id: user_id_v },
        success: function(response) {
            console.log(response);
            if (response) {
                $(button).data("userId", 0);
                $(button).text("Following");
                // $(button).attr("disabled", true);
                // < i class = "bi bi-check2-all" > </i>
            } else {
                $(button).attr("disabled", false);
                alert("something is wrong, try again!!..");
            }
        },
    });
});

//for unfollow the user

$(".unfollowbtn").click(function() {
    var user_id_v = $(this).data("userId");
    var button = this;
    $(button).attr("disabled", true);
    // $(this).text(user_id);

    $.ajax({
        url: "assets/php/ajax.php?unfollow",
        method: "post",
        datatype: "json",
        data: { user_id: user_id_v },
        success: function(response) {
            console.log(response);
            if (response) {
                $(button).data("userId", 0);
                $(button).text("unfollowed");
                // $(button).attr("disabled", false);
                // < i class = "bi bi-check2-all" > </i>
            } else {
                $(button).attr("disabled", false);
                alert("something is wrong, try again!!..");
            }
        },
    });
});

//for like the post

$(".like_btn").click(function() {
    var post_id_v = $(this).data("postId");
    var button = this;
    $(button).attr("disabled", true);
    // $(this).text(user_id);

    $.ajax({
        url: "assets/php/ajax.php?like",
        method: "post",
        datatype: "json",
        data: { post_id: post_id_v },
        success: function(response) {
            console.log(response);
            if (response) {
                $(button).attr("disabled", false);
                $(button).hide();
                $(button).siblings(".unlike_btn").show();
                location.reload();
            } else {
                $(button).attr("disabled", false);
                alert("something is wrong,try again after some time ");
            }
        },
    });
});

//for unlike the post

$(".unlike_btn").click(function() {
    var post_id_v = $(this).data("postId");
    var button = this;
    $(button).attr("disabled", true);

    $.ajax({
        url: "assets/php/ajax.php?unlike",
        method: "post",
        datatype: "json",
        data: { post_id: post_id_v },
        success: function(response) {
            console.log(response);
            if (response) {
                $(button).attr("disabled", false);
                $(button).hide();
                $(button).siblings(".like_btn").show();
                location.reload();
            } else {
                $(button).attr("disabled", false);
                alert("something is wrong, try again!!..");
            }
        },
    });
});

//for adding the comments

$(".add-comment").click(function() {
    var button = this;

    var comment_v = $(button).siblings(".comment-input").val();

    if (comment_v == "") {
        return 0;
    }
    var post_id_v = $(this).data("postId");
    var cs = $(this).data("cs");
    var page = $(this).data("page");
    // var page = $(this).data('wall');

    $(button).attr("disabled", true);
    $(button).siblings(".comment-input").attr("disabled", true);
    $.ajax({
        url: "assets/php/ajax.php?addcomment",
        method: "post",
        dataType: "json",
        data: { post_id: post_id_v, comment: comment_v },
        success: function(response) {
            console.log(response);
            if (response.status) {
                $(button).attr("disabled", false);
                $(button).siblings(".comment-input").attr("disabled", false);
                $(button).siblings(".comment-input").val("");
                $("#" + cs).prepend(response.comment);

                $(".nce").hide();
                if (page == "wall") {
                    location.reload();
                }
            } else {
                $(button).attr("disabled", false);
                $(button).siblings(".comment-input").attr("disabled", false);

                alert("something is wrong,try again after some time");
            }
        },
    });
});






// for message requests

var chatting_user_id = 0;

$(".chatlist_item").click();

function popchat(user_id) {
    $("#user_chat").html(`<div class="spinner-border text-center" role="status">
  </div>`);

    $("#chatter_username").text("loading..");
    $("#chatter_name").text("");
    $("#chatter_pic").attr("src", "assets/images/profile/default_profile.jpeg");
    chatting_user_id = user_id;
    $("#sendmsg").attr("data-user-id", user_id);
}





// for sending a message


$("#sendmsg").click(function() {
    var user_id = chatting_user_id;
    var msg = $("#msginput").val();
    console.log(user_id);
    if (!msg) return;

    $("#sendmsg").attr("disabled", true);
    $("#msginput").attr("disabled", true);
    $.ajax({
        url: 'assets/php/ajax.php?sendmessage',
        method: 'post',
        dataType: 'json',
        data: { user_id: user_id, msg: msg },
        success: function(response) {
            if (response.status) {
                $("#sendmsg").attr("disabled", false);
                $("#msginput").attr("disabled", false);
                $("#msginput").val('');
            } else {
                alert('someting went wrong, try again after some time');
            }



        }
    });

});








console.log(chatting_user_id);

function synmsg() {
    $.ajax({
        url: "assets/php/ajax.php?getmessages",
        method: "post",
        dataType: "json",
        data: { chatter_id: chatting_user_id },
        success: function(response) {
            // console.log(response);
            $("#chatlist").html(response.chatlist);
            if (response.newmsgcount == 0) {
                $("#msgcounter").hide();
            } else {
                $("#msgcounter").show();
                $("#msgcounter").html("<small>" + response.newmsgcount + "</small>");
            }

            if (chatting_user_id != 0) {
                $("#user_chat").html(response.chat.msgs);

                $("#chatter_username").text(response.chat.userdata.username);
                // $("#cplink").attr("href", "?u=" + response.chat.userdata.username);

                $("#chatter_name").text(
                    response.chat.userdata.first_name +
                    " " +
                    response.chat.userdata.last_name
                );
                $("#chatter_pic").attr(
                    "src",
                    "assets/images/profile/" + response.chat.userdata.profile_pic
                );
            }
        },
    });
}

synmsg();

setInterval(() => {
    synmsg();
}, 1000);