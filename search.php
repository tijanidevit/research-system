<?php 
session_start();
if (isset($_SESSION['research_user'])) {
    $user = $_SESSION['research_user'];
}
else{
    header('location: login');
}

if (!isset($_GET['s'])) {
    header('location: ./');
}
$s = $_GET['s'];

include_once 'core/posts.class.php';
$post_obj = new Posts();


$search_posts = $post_obj->fetch_search_posts($s);
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
                    <div class="col-md-12">
                        <div class="post" style="padding: 20px">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2>Search: <?php echo $s ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <?php if (empty($search_posts)): ?>
                            <div class="post" style="padding: 20px">
                                <h4>No Result Available for your search entry. Try another search entry</h4>
                            </div>
                        <?php endif ?>
                        <?php foreach ($search_posts as $search_post): ?>
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $search_post['profile_image'] ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="post?id=<?php echo $search_post['id'] ?>"><?php echo $search_post['title'] ?></a></h2>
                                        <p><?php echo substr($search_post['content'],0,150) ?>...</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                            <?php echo $post_obj->fetch_post_comments_num($search_post['id']) ?>
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views" style="padding: 14px"><i class="fa fa-eye"></i> <?php echo $search_post['views'] ?></div>                                    
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
                                        <li><a href="department?id=<?php echo $department['id'] ?>"><?php echo $department['department'] ?><span class="badge pull-right"><?php echo $post_obj->fetch_department_post_nums($department['id']) ?></span></a></li>
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