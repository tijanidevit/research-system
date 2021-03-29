<?php 
    include_once 'core/departments.class.php';
    $department_obj = new Departments();
    $departments = $department_obj->fetch_departments();
?>
<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            <!-- SLIDE  -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                <!-- MAIN IMAGE -->
                <img src="images/slide.jpg" style="width: 94vw;" alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                <!-- LAYERS -->
            </li>
        </ul>
    </div>
</div>
<div class="headernav">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="./"><img src="images/logo.jpg" alt=""  /></a></div>
            <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                <div class="dropdown">
                    <a data-toggle="dropdown" href="#" >Departments</a> <b class="caret"></b>
                    <ul class="dropdown-menu" role="menu">
                        <?php foreach ($departments as $department): ?>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="department?id=<?php echo $department['id'] ?>"><?php echo $department['department'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                <div class="wrap">
                    <form action="search" method="get" class="form">
                        <div class="pull-left txt"><input type="text" name="s" class="form-control" placeholder="Search Topics"></div>
                        <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                <div class="stnt pull-left">                            
                    <?php if (!isset($_SESSION['research_user'])): ?>
                        <a href="register" class="btn btn-primary">Register</a>
                        <a href="login" class="btn btn-primary">Login</a>
                    <?php endif ?>
                </div>
                <?php if (isset($_SESSION['research_user'])): ?>

                    <div class="stnt pull-left">                            
                        <a href="new_post" class="btn btn-primary">Start New Topic</a>
                    </div>

                    <div class="avatar pull-left dropdown" style="padding-left: 2em">
                        <a data-toggle="dropdown" href="#"><img src="images/avatar.jpg" alt="" /></a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="profile">My Profile</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-3" href="logout">Log Out</a></li>
                        </ul>
                    </div>
                <?php endif ?>
                

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>