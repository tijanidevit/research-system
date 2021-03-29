<?php 
session_start();
if (!isset($_SESSION['museum_admin'])) {
    header('location: ./');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include_once 'components/header.php'; ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include_once 'components/sidebar.php'; ?>

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Add Blog Post</h4>
                        </div>
                    </div>

                    <form id="museumForm" enctype="multipart/form-data" class="form-horizontal">
                        <div id="result"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                    for="simpleinput">Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" class="form-control" required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label" for="example-textarea">Content</label>
                                    <div class="col-lg-10">
                                        <textarea id="summernote-editor" required name="content"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                    for="cover_image">Cover Image</label>
                                    <div class="col-lg-10">
                                        <input type="file" accept="image/*" id="cover_image" name="cover_image" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-dark">
                                <span class="spinner" style="display: none;">
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                </span>
                                <span class="btnText">
                                    Add Blog Post
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div> <!-- content -->
            <?php include_once 'components/footer.php'; ?>
        </div>
    </div>
</body>
</html>


<script>
    $('#museumForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_post.php',
            type: 'POST',
            data : new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.spinner').show();
                $('.btnText').hide();
            },
            success: function(data){

                $('.spinner').hide();
                $('.btnText').show();

                if (data.includes('success')) {
                    location.href = 'posts';
                }
                $('#result').html(data);
                $('#result').fadeIn();
                $('.spinner').hide();

                console.log(data);
            }
        })
    });
</script>