<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130582519-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-130582519-1');
  </script>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Azia">
  <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/azia">
  <meta property="og:title" content="Azia">
  <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

  <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
  <meta name="author" content="ThemePixels">

  <title><?= $this->renderSection('title') ?></title>

  <!-- vendor css -->
  <link href="<?= base_url('dashboard/lib/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/typicons.font/typicons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/morris.js/morris.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/flag-icon-css/css/flag-icon.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/jqvmap/jqvmap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/lightslider/css/lightslider.min.css') ?>" rel="stylesheet">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <!-- azia CSS -->
  <link rel="stylesheet" href="<?= base_url('dashboard/css/azia.css') ?>">
  <link rel="stylesheet" href="<?= base_url('select2/dist/css/select2.css') ?>">


</head>

<body class="az-body az-body-sidebar">

  <div class="az-sidebar">
    <div class="az-sidebar-header">
      <a href="index.html">
        <h3 class="text-success"><strong>LOGO</strong></h3>
      </a>
    </div><!-- az-sidebar-header -->
    <!-- <div class="az-sidebar-loggedin">
      <div class="az-img-user online"><img src="https://via.placeholder.com/500" alt=""></div>
      <div class="media-body">
        <h6>Aziana Pechon</h6>
        <span>Premium Member</span>
      </div> media-body -->
    <!-- </div>az-sidebar-loggedin -->
    <div class="az-sidebar-body">
      <ul class="nav">
        <li class="nav-label">Main Menu</li>
        <li class="nav-item active">
          <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Dashboard</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="dashboard-one.html" class="nav-sub-link">Web Analytics</a></li>
            <li class="nav-sub-item active"><a href="dashboard-two.html" class="nav-sub-link">Sales Monitoring</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i>Sales</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="/sales" class="nav-sub-link">Sales</a></li>
            <li class="nav-sub-item"><a href="/buyers" class="nav-sub-link">Buyers</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Supplies</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="/deliveries" class="nav-sub-link">Deliveries</a></li>
            <li class="nav-sub-item"><a href="/suppliers" class="nav-sub-link">Suppliers</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-archive"></i>Admin</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="/admin/coffee-grades" class="nav-sub-link">Coffee Grades</a></li>
          </ul>
        </li><!-- nav-item -->
      </ul><!-- nav -->
    </div><!-- az-sidebar-body -->
  </div><!-- az-sidebar -->

  <div class="az-content az-content-dashboard-two">
    <div class="az-header">
      <div class="container-fluid">
        <div class="az-header-left">
          <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-center">
          <input type="search" class="form-control" placeholder="Search for anything...">
          <button class="btn"><i class="fas fa-search"></i></button>
        </div><!-- az-header-center -->
        <div class="az-header-right">
          <div class="az-header-message">
            <a href="app-chat.html"><i class="typcn typcn-messages"></i></a>
          </div><!-- az-header-message -->
          <div class="dropdown az-header-notification">
            <a href="" class="new"><i class="typcn typcn-bell"></i></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header mg-b-20 d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <h6 class="az-notification-title">Notifications</h6>
              <p class="az-notification-text">You have 2 unread notification</p>
              <div class="az-notification-list">
                <div class="media new">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                  <div class="media-body">
                    <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                    <span>Mar 15 12:32pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media new">
                  <div class="az-img-user online"><img src="https://via.placeholder.com/500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Joyce Chua</strong> just created a new blog post</p>
                    <span>Mar 13 04:16am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                    <span>Mar 13 02:56am</span>
                  </div><!-- media-body -->
                </div><!-- media -->
                <div class="media">
                  <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                  <div class="media-body">
                    <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                    <span>Mar 12 10:40pm</span>
                  </div><!-- media-body -->
                </div><!-- media -->
              </div><!-- az-notification-list -->
              <div class="dropdown-footer"><a href="">View All Notifications</a></div>
            </div><!-- dropdown-menu -->
          </div><!-- az-header-notification -->
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="https://via.placeholder.com/500" alt="">
                </div><!-- az-img-user -->
                <h6>''</h6>
                <span><?= $commonData['user']['name'] ?></span>
              </div><!-- az-header-profile -->

              <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
              <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
              <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
              <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
              <a href="<?= site_url('logout'); ?>" class="dropdown-item"><i class="typcn typcn-power-outline"></i>
                Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->
    <!-- Body Content -->
    <div class="content-body">

      <!-- row -->
      <?= $this->renderSection('content') ?>

    </div>
    <!-- Footer -->
    <div class="az-footer ht-40">
      <div class="container-fluid pd-t-0-f ht-100p">
        <span>&copy; Coffee Enterprise Management System (CEMS) | Version 1.0</span>
        <span>Designed by: Guuga Consults</span>
      </div><!-- container -->
    </div><!-- az-footer -->
  </div><!-- az-content -->


  <script src="<?= base_url('dashboard/lib/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="<?= base_url('dashboard/lib/ionicons/ionicons.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/raphael/raphael.min.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/morris.js/morris.min.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/jqvmap/jquery.vmap.min.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
  <script src="<?= base_url('dashboard/lib/lightslider/js/lightslider.min.js') ?>"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('dashboard/js/azia.js') ?>"></script>
  <script src="<?= base_url('select2/dist/js/select2.js') ?>"></script>
  <script>
    $(function() {
      'use strict'

      $('.az-sidebar .with-sub').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
      })

      $(document).on('click touchstart', function(e) {
        e.stopPropagation();

        // closing of sidebar menu when clicking outside of it
        if (!$(e.target).closest('.az-header-menu-icon').length) {
          var sidebarTarg = $(e.target).closest('.az-sidebar').length;
          if (!sidebarTarg) {
            $('body').removeClass('az-sidebar-show');
          }
        }
      });


      $('#azSidebarToggle').on('click', function(e) {
        e.preventDefault();

        if (window.matchMedia('(min-width: 992px)').matches) {
          $('body').toggleClass('az-sidebar-hide');
        } else {
          $('body').toggleClass('az-sidebar-show');
        }
      })

      //tabs
      $('#navComplex').lightSlider({
        autoWidth: true,
        pager: false,
        slideMargin: 3
      });

      $('.az-nav-tabs .tab-link').on('click', function(e) {
        e.preventDefault();
        $(this).addClass('active');
        $(this).parent().siblings().find('.tab-link').removeClass('active');

        var target = $(this).attr('href');
        $(target).addClass('active');
        $(target).siblings().removeClass('active');
      })
    })
  </script>
  <!--placeholder for our extra scripts-->
  <?= $this->renderSection('scripts') ?>
</body>

</html>