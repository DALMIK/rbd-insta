<?php if (isset($_SESSION['Auth'])) { ?>
  <!-- Modal -->
  <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img style="display:none" id="post_img" class="w-100 rounded border">
          <form method="POST" action="assets/php/actions.php?addpost" enctype="multipart/form-data">
            <div class="my-3">

              <input class="form-control" name="post_img" type="file" id="select_post_img">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Your Caption...</label>
              <textarea class="form-control" name="post_text" id="exampleFormControlTextarea1" rows="1"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
          </form>
        </div>
      </div>
    </div>
  </div>





  <!-- offcanvas modal for chatting engine -->

  <div class="offcanvas offcanvas-start" tabindex="-1" id="message_sidebar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Messages</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="chatlist">

    </div>
  </div>




  <!-- scrollable Modal for chat box -->

  <div class="modal fade" id="chatbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><img src="assets/images/profile/default_profile.jpeg" id="chatter_pic" height="40" width="40" class="m-1 rounded-circle border"><span id="chatter_name"></span> (@<span class="small" id="chatter_username">Loading...</span>) </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column-reverse gap-3" id="user_chat">
          Loading....
        </div>
        <div class="modal-footer">
          <div class="input-group p-2">
            <input type="text" class="form-control rounded-0 border-1" id="msginput" placeholder="say something.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary rounded-0 border-0" id="sendmsg" data-user-id="" type="button">Send</button>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>






<?php } ?>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/custom.js?v=<?= time() ?>"></script>
</body>

</html>