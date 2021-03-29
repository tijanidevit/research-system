<?php 
    session_start();
    if (isset($_SESSION['research_user'])) {
        header('location: ./');
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'components/head.php'; ?>
<body class="newaccountpage">

    <div class="container-fluid">

        <?php include_once 'components/header.php'; ?>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 breadcrumbf">
                        <a href="#">Create New account</a> 
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <!-- POST -->
                        <div class="post">
                            <form enctype="multipart/form-data" id="registerForm" class="form newtopic"  method="post">
                                <div class="postinfotop">
                                    <h2>Create New Account</h2>
                                </div>

                                <!-- acc section -->
                                <div class="accsection">
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                        </div>
                                        <div class="posttext pull-left">
                                            <div id="resultR"></div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" />
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="text" name="username" placeholder="Username" class="form-control" />
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="file" accept="image/*" name="profile_image" placeholder="profile_image" class="form-control" />
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <select name="department_id" class="form-control">
                                                        <?php foreach ($departments as $department): ?>
                                                            <option value="<?php echo $department['id'] ?>"><?php echo $department['department'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="password" placeholder="Password" class="form-control" id="pass" name="password" />
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <input type="password" placeholder="Retype Password" class="form-control" id="pass2" name="c_password" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>  
                                </div><!-- acc section END -->

                                <div class="postinfobot">

                                    <div class="notechbox pull-left">
                                        <input type="checkbox" checked name="note" id="note" class="form-control" />
                                    </div>

                                    <div class="pull-left lblfch">
                                        <label for="note"> I agree with the Terms and Conditions of this site</label>
                                    </div>

                                    <div class="pull-right postreply">
                                        <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                        <div class="pull-left">
                                            <button class="btn btn-primary">
                                                <i class="icon-rocket"></i>
                                                <span class="spinner" style="display: none;">
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                </span>
                                                <span class="btnText">
                                                    Register
                                                </span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div><!-- POST -->






                    </div>
                    <div class="col-lg-4 col-md-4">

                        <!-- -->
                        <div class="sidebarblock">
                            <h3>Categories</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats">
                                    <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>
                                    <li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>
                                    <li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>
                                    <li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>
                                    <li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>
                                    <li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>
                                    <li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'components/footer.php'; ?>
    </div>



    <?php include_once 'components/scripts.php'; ?>

    <!-- END REVOLUTION SLIDER -->
</body>
</html>

<script>
    $('#registerForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/register.php',
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

                if (data == 1) {
                    location.href = './';
                }
                else{
                    $('#resultR').html(data);
                    $('#resultR').fadeIn();
                    $('.spinner').hide();
                }
                console.log(data);
            }
        })
    });

</script>