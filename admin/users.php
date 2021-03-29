<?php 
session_start();
if (!isset($_SESSION['research_admin'])) {
    header('location: ./');
    exit();
}

include_once '../core/users.class.php';

$user_obj = new users();
$users = $user_obj->fetch_users();
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
                            <h4 class="mb-1 mt-0">Users</h4>
                        </div>
                    </div>

                    
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-2">List of Registered Users</h4>
                                        <p></p>
                                        <table id="basic-datatable" class="table dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <th>Username</th>
                                                    <th>Date Joined</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $user): ?>
                                                    <tr>
                                                        <td><?php echo $user['first_name'].' '.$user['last_name'] ?></td>
                                                        <td><?php echo $user['username'] ?></td>
                                                        <td><?php echo $user['time_added'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
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