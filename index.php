<?php 
    session_start();
    include_once 'core/posts.class.php';
    $post_obj = new Posts();
    if (isset($_SESSION['research_user'])) {
        $user = $_SESSION['research_user'];
        $user_posts = $post_obj->fetch_user_posts($user['id']);
    }
    $posts = $post_obj->fetch_posts();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'components/head.php'; ?>
<body>

    <div class="container-fluid">

        <?php include_once 'components/header.php'; ?>

        <section class="content">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xs-12 col-md-8">
                        <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                        <div class="pull-left">
                            <ul class="paginationforum">
                                <li class="hidden-xs"><a href="#">1</a></li>
                                <li class="hidden-xs"><a href="#">2</a></li>
                                <li class="hidden-xs"><a href="#">3</a></li>
                                <li class="hidden-xs"><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#" class="active">7</a></li>
                                <li><a href="#">8</a></li>
                                <li class="hidden-xs"><a href="#">9</a></li>
                                <li class="hidden-xs"><a href="#">10</a></li>
                                <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                                <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                                <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                                <li><a href="#">1586</a></li>
                            </ul>
                        </div>
                        <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> -->


            <div class="container" style="margin-top: 10px">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <!-- POST -->
                        <?php foreach ($posts as $post): ?>
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img style="max-width: 30px" src="uploads/images/<?php echo $post['profile_image'] ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2><a href="post?id=<?php echo $post['id'] ?>"><?php echo $post['title'] ?></a></h2>
                                        <p><?php echo substr($post['content'],0,150) ?>...</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                            <?php echo $post_obj->fetch_post_comments_num($post['id']) ?>
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views" style="padding: 14px"><i class="fa fa-eye"></i> <?php echo $post['views'] ?></div>                                    
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



            <!-- <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xs-12">
                        <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                        <div class="pull-left">
                            <ul class="paginationforum">
                                <li class="hidden-xs"><a href="#">1</a></li>
                                <li class="hidden-xs"><a href="#">2</a></li>
                                <li class="hidden-xs"><a href="#">3</a></li>
                                <li class="hidden-xs"><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#" class="active">7</a></li>
                                <li><a href="#">8</a></li>
                                <li class="hidden-xs"><a href="#">9</a></li>
                                <li class="hidden-xs"><a href="#">10</a></li>
                                <li class="hidden-xs hidden-md"><a href="#">11</a></li>
                                <li class="hidden-xs hidden-md"><a href="#">12</a></li>
                                <li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>
                                <li><a href="#">1586</a></li>
                            </ul>
                        </div>
                        <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div> -->


        </section>
        <?php include_once 'components/footer.php'; ?>
    </div>
</body>
<?php include_once 'components/scripts.php'; ?>
</html>