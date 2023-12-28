<?php
session_start();
include('config.php');
include("includes/header.php");
include('includes/topbar.php');
include('includes/sidebar.php');
include('./Newsletter_Action/sendNewsletter.php');
if ($mes) {
?>
<script>
alert("email send")
</script><?php
            }
                ?>
<style>
.newsletter {
    margin-left: 10% !important;
    margin-top: 50px;

}

.UploadBanner {
    cursor: pointer;
    position: absolute;
    top: 0%;
    left: 0;
    border-radius: 50%;
    width: 170px;
    transform: scale(3);
    opacity: 0;
}
</style>
<div class="content-wrapper overflow-hidden">

    <div class="main">
        <div class="container">
            <h2 class="text-center">Create Newsletter</h2>
            <div class="container newsletter">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mb-3" style="width: 80%;">
                            <input type="text" name="subject" class="form-control" placeholder="Subject;" required>
                        </div>
                        <div class="col mb-3">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" required
                                rows="12" placeholder="The news"></textarea>
                        </div>
                        <div class="col mb-3">
                            <button type="button" class="btn btn-info overflow-hidden" placeholder="Upload banner">
                                <i class="fa-sharp fa-solid fa-file-arrow-up"></i> Upload banner
                                <input type="file" name="Banner" class="UploadBanner">
                            </button>
                        </div>
                        <div>
                            <button type="submit" name="send" class="btn btn-primary">send</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</div>
<?php
include('includes/footer.php');