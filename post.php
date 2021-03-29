<?php 
session_start();
if (isset($_SESSION['research_user'])) {
    $user = $_SESSION['research_user'];
}
else{
    header('location: login');
}
if (!isset($_GET['id'])) {
 header('location: ./');
}
$id = $_GET['id'];

include_once 'core/posts.class.php';
$post_obj = new Posts();
$post = $post_obj->fetch_post($id);
if (empty($post)) {
    header('location: ./');
}
$post_views = $post['views'] + 1;
$post_obj->update_post_views($post_views,$id);
$post_comments = $post_obj->fetch_post_comments($id);
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
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <img style="max-width: 40px" src="uploads/images/<?php echo $post['profile_image'] ?>" alt="" />
                                    </div>
                                </div>
                                <div class="posttext pull-left">
                                    <h2><?php echo $post['title'] ?></h2>
                                    <p class="text-justify"><?php echo $post['content'] ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>                              
                            <div class="postinfobot">

                                <div class="likeblock pull-left">
                                    <a href="#" class="up"><i class="fa fa-eye"></i><?php echo $post_views ?></a>
                                </div>

                                <div class="prev pull-left">                                        
                                    <a href="#commentForm" title="Add Comment"><i class="fa fa-reply"></i></a>
                                </div>

                                <div class="poste pull-left"><i class="fa fa-clock-o"></i> Posted on : <?php echo $post['time_added'] ?> by <a href="profile?id=<?php echo $post['user_id'] ?>"><?php echo $post['first_name'].' '.$post['last_name'] ?></a></div>

                                <div class="clearfix"></div>
                            </div>                              
                            <div class="postinfobot">
                                <div class="likebloc">
                                    <a href="uploads/documents/<?php echo $post['document'] ?>" download class="up"><i class="fa fa-download"></i> Download Document</a>
                                </div>
                            </div>
                        </div><!-- POST -->



                        <?php foreach ($post_comments as $post_comment): ?>
                            <div class="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $post_comment['profile_image'] ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <p><?php echo $post_comment['comment'] ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">
                                    <div class="postd pull-left"><i class="fa fa-clock-o"></i> Posted on : <?php echo $post_comment['date_added'] ?> by <a href="profile?id=<?php echo $post_comment['user_id'] ?>"><?php echo $post_comment['first_name'].' '.$post_comment['last_name'] ?></a></div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php endforeach ?>



                        <!-- POST -->
                        <div class="post">
                            <form id="commentForm" class="form" method="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $user['profile_image'] ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <div id="result"></div>
                                        <div class="textwraper">
                                            <div class="postreply">Post a Reply</div>
                                            <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">
                                            <textarea name="comment" id="comment" placeholder="Type your message here"></textarea>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">
                                    <div class="pull-right postreply">
                                        <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                        <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
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
    $('#commentForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_comment.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('.spinner').show();
                $('.btnText').hide();
            },
            success: function(data){

                $('.spinner').hide();
                $('.btnText').show();

                if (data == 1) {
                    location.reload();
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