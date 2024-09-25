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
  <meta name="description" content="Coffee Tracking System">
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
  <!-- azia CSS -->
  <link rel="stylesheet" href="<?= base_url('dashboard/css/azia.css') ?>">
  <link rel="stylesheet" href="<?= base_url('select2/dist/css/select2.css') ?>">


</head>

<body class="az-body az-body-sidebar">

  <div class="az-sidebar">
    <div class="az-sidebar-header">
      <a href="#">
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
          <a href="#" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Dashboard</a>
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
            <!-- <a href="app-chat.html"><i class="typcn typcn-messages"></i></a> -->
          </div><!-- az-header-message -->
          <div class="dropdown az-header-notification">
            <a href="" class="news"><i class="typcn typcn-bell"></i></a>
         
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
              <a href="" class="dropdown-item"><i class="typcn typcn-trash"></i> Edit Profile</a>
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
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <!-- Buttons JS -->
  <script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="<?= base_url('dashboard/js/azia.js') ?>"></script>
  <script src="<?= base_url('select2/dist/js/select2.js') ?>"></script>
  <!-- Moment.js for DateTime handling -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <!-- Date Range Picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    $(function() {
      'use strict';
      // Check for saved sidebar state in localStorage
      const isSidebarCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
      if (isSidebarCollapsed) {
        $('body').addClass('az-sidebar-hide');
      }

      // Sidebar collapse on page load
      if (window.matchMedia('(min-width: 992px)').matches) {
        $('body').addClass('az-sidebar-hide'); // Add this to start with the sidebar collapsed on larger screens
      } else {
        $('body').removeClass('az-sidebar-show'); // Ensure sidebar is not visible on smaller screens by default
      }

      // Sidebar toggle on click
      $('#azSidebarToggle').on('click', function(e) {
        e.preventDefault();

        if (window.matchMedia('(min-width: 992px)').matches) {
          $('body').toggleClass('az-sidebar-hide'); // Toggle for larger screens
        } else {
          $('body').toggleClass('az-sidebar-show'); // Toggle for smaller screens
        }
      });

      // Sidebar submenu functionality
      $('.az-sidebar .with-sub').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).parent().siblings().removeClass('show');
      });

      // Close sidebar when clicking outside of it
      $(document).on('click touchstart', function(e) {
        e.stopPropagation();

        if (!$(e.target).closest('.az-header-menu-icon').length) {
          var sidebarTarg = $(e.target).closest('.az-sidebar').length;
          if (!sidebarTarg) {
            $('body').removeClass('az-sidebar-show');
          }
        }
      });

      // Tab switching functionality
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
      });

      // Date range picker settings (commented out for your reference)
      /*
      var dateRangeSettings = {
        startDate: moment().subtract(6, 'days'),
        endDate: moment(),
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'This Year': [moment().startOf('year'), moment()],
          'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
          'Custom Range': [null, null]
        },
        alwaysShowCalendars: true,
        locale: {
          format: 'MM/DD/YYYY'
        }
      };
      */
    });
  </script>
  <!--placeholder for our extra scripts-->
  <?= $this->renderSection('scripts') ?>
</body>

</html>