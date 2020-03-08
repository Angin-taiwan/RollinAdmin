<?php
session_start();

if (isset($_SESSION["username"]) && strtolower($_SESSION["username"]) == "johndoe") {

} else {
  unset($_SESSION["username"]);
  header("Location: http://".$_SERVER['HTTP_HOST']."/RollinAdmin/login.php");
  exit();
}

if (isset($_POST["logout"])) {
  echo $_SESSION["username"];
  unset($_SESSION["username"]);
  header("Location: http://".$_SERVER['HTTP_HOST']."/RollinAdmin/login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Rollin Admin</title>

    <base href="/RollinAdmin/" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />

    <!-- IonIcons -->
    <link
      rel="stylesheet"
      href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
      rel="stylesheet"
    />
    <!-- Custom -->
    <link rel="stylesheet" href="dist/css/header.css" />
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href=""
              ><i class="fas fa-bars"></i
            ></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/RollinAdmin/Home" class="nav-link">Home</a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Login User Info -->
          <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="image/Admin/admin.jpg" class="user-image img-circle elevation-2 alt="User Image">
              <span class="hidden-xs">John Doe</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="image/Admin/admin.jpg" class="img-circle elevation-2" alt="User Image">
                <p>
                  John Doe
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="">
                  <a href="javascript:event.preventDefault();" class="btn btn-default btn-flat float-left">Profile</a>
                  <form method="POST" action="">
                    <input type="submit" name="logout" class="btn btn-default btn-flat float-right" value="Log out">
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- / Login User Info -->
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/RollinAdmin/Home" class="brand-link">
          <img
            src="image/Admin/rollinlogo.png"
            alt="Rollin Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
          />
          <span class="brand-text font-weight-light">Rollin Skate Shop</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview <?php if ($pageDir == 'News') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'News') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                    消息管理
                  <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/News/List" class="nav-link <?php if ($pageTitle == 'News List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>消息清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/News/Create" class="nav-link <?php if ($pageTitle == 'News Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>消息新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Course') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Course') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-school"></i>
                  <p>
                    課程管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Course/List" class="nav-link <?php if ($pageTitle == 'Course List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>課程清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Course/Create" class="nav-link <?php if ($pageTitle == 'Course Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>課程新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'User') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'User') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    會員管理
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/User/List" class="nav-link <?php if ($pageTitle == 'User List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>會員清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/User/Create" class="nav-link <?php if ($pageTitle == 'User Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>會員新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Product') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Product') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>
                    商品管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Product/List" class="nav-link <?php if ($pageTitle == 'Product List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>商品清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Product/Create" class="nav-link <?php if ($pageTitle == 'Product Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>商品新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Order') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Order') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-clipboard-check"></i>
                  <p>
                    訂單管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Order/List" class="nav-link <?php if ($pageTitle == 'Order List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>訂單清單</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="/RollinAdmin/Order/Create" class="nav-link <?php if ($pageTitle == 'Order Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Order Create</p>
                    </a>
                  </li> -->
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Coupon') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Coupon') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                    折價券管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Coupon/List" class="nav-link <?php if ($pageTitle == 'Coupon List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>折價券清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Coupon/Create" class="nav-link <?php if ($pageTitle == 'Coupon Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>折價券新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- <li class="nav-item has-treeview <?php if ($pageDir == 'Marketing') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Marketing') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>
                    行銷管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Marketing/List" class="nav-link <?php if ($pageTitle == 'Marketing List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>全店優惠清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Marketing/Create" class="nav-link <?php if ($pageTitle == 'Marketing Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>全店優惠新增</p>
                    </a>
                  </li>
                </ul>
              </li> -->
              <li class="nav-item has-treeview <?php if ($pageDir == 'Brand') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Brand') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-store"></i>
                  <p>
                    品牌管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Brand/List" class="nav-link <?php if ($pageTitle == 'Brand List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>品牌清單</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Brand/Create" class="nav-link <?php if ($pageTitle == 'Brand Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>品牌新增</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Category') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Category') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    類別管理
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Category/List" class="nav-link <?php if ($pageTitle == 'Category List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>類別清單</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="/RollinAdmin/Category/Create" class="nav-link <?php if ($pageTitle == 'Category Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>類別新增</p>
                    </a>
                  </li> -->
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= isset($pageTitleTW) ? $pageTitleTW : $pageTitle ?></h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/RollinAdmin/Home">Home</a></li>
                  <?php if ($pageDir !== ""): ?>
                    <li class="breadcrumb-item active"><?= isset($pageDirTW) ? $pageDirTW : $pageDir ?></li>
                  <?php endif;?>
                  <?php if ($pageTitle !== "Home"): ?>
                    <li class="breadcrumb-item active"><?= isset($pageTitleTW) ? $pageTitleTW : $pageTitle ?></li>
                  <?php endif;?>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
