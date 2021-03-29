<?php 
session_start();
if (isset($_SESSION['research_user'])) {
    $user = $_SESSION['research_user'];
}
else{
    header('location: login');
}

include_once 'core/posts.class.php';
$post_obj = new Posts();

$user_posts = $post_obj->fetch_user_posts($user['id']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>

    <div class="container-fluid">

        <?php include_once 'components/header.php'; ?>

        <section class="content">
            <div class="container" style="margin-top: 10px">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <div class="post">
                            <div id="result"></div>
                            <form id="postForm" enctype="multipart/form-data" class="form newtopic" method="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $user['profile_image'] ?>" alt="" />
                                            <div class="status red">&nbsp;</div>
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">

                                        <div>
                                            <input type="text" name="title" placeholder="Enter Topic Title" class="form-control" />
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <select name="department_id" id="department"  class="form-control" >
                                                    <option value="" disabled selected>Select Department</option>
                                                    <?php foreach ($departments as $department): ?>
                                                        <option value="<?php echo $department['id'] ?>"><?php echo $department['department'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="file" type="application/*" name="document" class="form-control" />
                                            </div>
                                        </div>

                                        <div>
                                            <textarea name="content" id="content" placeholder="Description"  class="form-control" ></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

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
                                                    Post
                                                </span>
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <!-- -->
                        <div class="sidebarblock">
                            <h3>Departments</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats">
                                    <?php foreach ($departments as $department): ?>
                                        <li><a href="department?id=<?php echo $department['id'] ?>"><?php echo $department['department'] ?><span class="badge pull-right"><?php echo $department_obj->fetch_department_post_nums($department['id']) ?></span></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>

                        <!-- -->
                        <!-- -->
                        <?php if (isset($user)): ?>
                            <div class="sidebarblock">
                                <h3>My Active Threads</h3>
                                <?php foreach ($user_posts as $user_post): ?>
                                    <div class="divline"></div>
                                    <div class="blocktxt">
                                        <a href="post?id=<?php echo $user_post['id'] ?>"><?php echo $user_post['title'] ?></a>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once 'components/footer.php'; ?>
    </div>
</body>
<?php include_once 'components/scripts.php'; ?>
</html>

<script>
    $('#postForm').submit(function(e) {
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

                if (!isNaN(data)) {
                    location.href = 'post?id='+data;
                }
                else{
                    $('#result').html(data);
                    $('#result').fadeIn();
                    $('.spinner').hide();
                }
            }
        })
    });
</script>