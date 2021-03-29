<?php 
session_start();
if (isset($_SESSION['research_user'])) {
    $user = $_SESSION['research_user'];
}
else{
    header('location: login');
}

include_once 'core/users.class.php';
include_once 'core/posts.class.php';

$user_id = $user['id'];

if (isset($_GET['id'])) {
 $user_id = $_GET['id'];
}

$user_obj = new Users();
$post_obj = new Posts();
$profile_user = $user_obj->fetch_user($user_id);
if (empty($user)) {
    header('location: ./');
}

$profile_user_posts = $post_obj->fetch_user_posts($user_id);
$active_user_posts = $post_obj->fetch_user_posts($user['id']);
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
                    <div class="col-md-12">
                        <div class="post" style="padding: 20px">
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="width: 10em" src="uploads/images/<?php echo $profile_user['profile_image'] ?>" alt="jkj" />
                                </div>
                                <div class="col-md-8">
                                    <h2><?php echo $profile_user['first_name'].' '. $profile_user['first_name'] ?></h2>
                                    <p>Username: <?php echo $profile_user['username'] ?></p>
                                    <p>Department: <?php echo $profile_user['department'] ?></p>
                                    <p>Total Posts: <?php echo count($profile_user_posts) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">

                        <?php foreach ($profile_user_posts as $profile_user_post): ?>
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $profile_user_post['profile_image'] ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="post?id=<?php echo $profile_user_post['id'] ?>"><?php echo $profile_user_post['title'] ?></a></h2>
                                        <p><?php echo substr($profile_user_post['content'],0,150) ?>...</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                            <?php echo $post_obj->fetch_post_comments_num($profile_user_post['id']) ?>
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views" style="padding: 14px"><i class="fa fa-eye"></i> <?php echo $profile_user_post['views'] ?></div>                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach ?>

                        <!-- POST -->

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
                                <?php foreach ($active_user_posts as $user_post): ?>
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