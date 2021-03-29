<?php 
session_start();
if (!isset($_SESSION['research_admin'])) {
    header('location: ./');
    exit();
}

include_once '../core/departments.class.php';

$department_obj = new Departments();
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

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Add Department</h4>
                        </div>
                    </div>

                    <form id="departmentForm" enctype="multipart/form-data" class="form-horizontal">
                        <div id="result"></div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label"
                                    for="simpleinput">Department</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="department" class="form-control" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-lg-2 col-form-label"
                                    for="simpleinput"></label>
                                    <div class="col-lg-8">
                                        <button class="btn btn-dark">
                                            <span class="spinner" style="display: none;">
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            </span>
                                            <span class="btnText">
                                                Add Department
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- content -->
            <?php include_once 'components/footer.php'; ?>
        </div>
    </div>
</body>
</html>
<script src="assets/libs/select2/select2.min.js"></script>
<script src="assets/libs/multiselect/jquery.multi-select.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>


<!--Summernote js-->
<script src="assets/libs/summernote/summernote-bs4.min.js"></script>

<!-- Init js -->
<script src="assets/js/pages/form-editor.init.js"></script> 

<script>
    $('#departmentForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_department.php',
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
                    location.href = 'departments';
                }
                $('#result').html(data);
                $('#result').fadeIn();
                $('.spinner').hide();

                console.log(data);
            }
        })
    });
</script>