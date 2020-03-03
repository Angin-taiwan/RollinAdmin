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
            <a href="/RollinAdmin" class="nav-link">Home</a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/RollinAdmin" class="brand-link">
          <img
            src="dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: .8"
          />
          <span class="brand-text font-weight-light">Rollin Skate Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="dist/img/user2-160x160.jpg"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="/RollinAdmin" class="d-block">Rollin Admin</a>
            </div>
          </div>

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
                    News
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/News/List" class="nav-link <?php if ($pageTitle == 'News List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>News List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/News/Create" class="nav-link <?php if ($pageTitle == 'News Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>News Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Course') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Course') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-school"></i>
                  <p>
                    Course
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Course/List" class="nav-link <?php if ($pageTitle == 'Course List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Course List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Course/Create" class="nav-link <?php if ($pageTitle == 'Course Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Course Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'User') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'User') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    User
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/User/List" class="nav-link <?php if ($pageTitle == 'User List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/User/Create" class="nav-link <?php if ($pageTitle == 'User Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>User Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Product') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Product') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-shopping-bag"></i>
                  <p>
                    Product
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Product/List" class="nav-link <?php if ($pageTitle == 'Product List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Product/Create" class="nav-link <?php if ($pageTitle == 'Product Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Product Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Order') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Order') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-clipboard-check"></i>
                  <p>
                    Order
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Order/List" class="nav-link <?php if ($pageTitle == 'Order List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Order List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Order/Create" class="nav-link <?php if ($pageTitle == 'Order Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Order Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Coupon') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Coupon') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                    Coupon
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Coupon/List" class="nav-link <?php if ($pageTitle == 'Coupon List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Coupon List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Coupon/Create" class="nav-link <?php if ($pageTitle == 'Coupon Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Coupon Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Marketing') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Marketing') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>
                    Marketing
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Marketing/List" class="nav-link <?php if ($pageTitle == 'Marketing List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Marketing List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Marketing/Create" class="nav-link <?php if ($pageTitle == 'Marketing Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Marketing Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Brand') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Brand') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-store"></i>
                  <p>
                    Brand
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Brand/List" class="nav-link <?php if ($pageTitle == 'Brand List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Brand List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Brand/Create" class="nav-link <?php if ($pageTitle == 'Brand Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Brand Create</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if ($pageDir == 'Category') {echo 'menu-open';}?> ">
                <a href="#" class="nav-link <?php if ($pageDir == 'Category') {echo 'active';}?> ">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    Category
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/RollinAdmin/Category/List" class="nav-link <?php if ($pageTitle == 'Category List') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Category List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/RollinAdmin/Category/Create" class="nav-link <?php if ($pageTitle == 'Category Create') {echo 'active';}?> ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Category Create</p>
                    </a>
                  </li>
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
                  <li class="breadcrumb-item"><a href="/RollinAdmin">Home</a></li>
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
