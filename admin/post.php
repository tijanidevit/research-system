<?php 
session_start();
if (!isset($_SESSION['museum_admin'])) {
    header('location: ./');
    exit();
}
if (!isset($_GET['id'])) {
    header('location: posts');
    exit();
}


include_once '../core/posts.class.php';
$id = $_GET['id'];
$post_obj = new posts();
$post = $post_obj->fetch_post($id);
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
                            <h4 class="mb-1 mt-0"><?php echo $post['title'] ?></h4>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mt-0 mb-2">Full Details of <?php echo $post['title'] ?></h4>
                                    <p></p>
                                    <div class="row bg-ligh p-3">

                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-md-5">
                                                        <img src="../uploads/images/<?php echo $post['cover_image'] ?>" class="card-img" alt="<?php echo $post['title'] ?>">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="card-body">
                                                            <h5 class="card-title font-size-16"><?php echo $post['title'] ?></h5>
                                                            
                                                            <div class="card-body">
                                                                <?php echo $post['content'] ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4"><a class="btn btn-danger" href="delete_post.php?id=<?php echo $post['post_id'] ?>">Delete</a></div>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
     <!-- content -->
    <?php include_once 'components/footer.php'; ?>

</body>
</html>
<script src="assets/libs/select2/select2.min.js"></script>
<script src="assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>


<!--Summernote js-->
<script src="assets/libs/summernote/summernote-bs4.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/form-editor.init.js"></script> 