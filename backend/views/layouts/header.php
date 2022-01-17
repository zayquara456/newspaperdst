<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    $jobs = $_SESSION['user']['jobs'];
    $avatar = $_SESSION['user']['avatar'];
    $year = date('Y', strtotime($_SESSION['user']['created_at']));
}

?>
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://zayquara1.xtgem.com" class="nav-link">Liên hệ</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown user user-menu">
        <a class="nav-link" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img src="assets/uploads/<?php echo $avatar; ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $username; ?></span>                  
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span style="font-size: 16px;" class="dropdown-item dropdown-header"><?php echo $username . ' - ' . $jobs; ?></span>
          <div class="dropdown-divider"></div>
        <big>Thành viên từ năm <?php echo $year; ?></big>
          <div class="dropdown-divider"></div>
          <div class="pull-left">
                                <a style="font-size: 16px;" href="#" class="btn btn-default btn-flat dropdown-item">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a style="font-size: 16px;" href="index.php?controller=user&action=logout" class="btn btn-default btn-flat dropdown-item">Sign
                                    out</a>
                            </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/uploads/<?php echo $avatar; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $username; ?></a>
        </div>
      </div>
       <nav class="mt-2">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="index.php?controller=category&action=index" class="nav-link">
                    <i class="fa fa-th"></i> <p>Quản lý danh mục</p>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?controller=subcate&action=index" class="nav-link">
                    <i class="fa fa-code"></i> <p>Quản lý danh mục con</p>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?controller=user&action=index" class="nav-link">
                    <i class="fa fa-user"></i> <p>Quản lý user</p>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
             <li class="nav-item">
                <a href="index.php?controller=news&action=index" class="nav-link">
                    <i class="fa fa-list-alt"></i> <p>Quản lý bài viết</p>
                    <span class="pull-right-container">
              <!--<small class="label pull-right bg-green">new</small>-->
            </span>
                </a>
            </li>
        </ul>
    </nav>
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Messaeg Wrapper. Contains messaege error and success -->
<div class="message-wrap content-wrap content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php
                echo $this->error;
                ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
        <!--        <div class="alert alert-danger">Lỗi validate</div>-->
        <!--        <p class="alert alert-success">Thành công</p>-->
    </section>
</div>