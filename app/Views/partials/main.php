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

  <title><?=$this->renderSection('title')?></title>

  <!-- vendor css -->
  <link href="<?= base_url('dashboard/lib/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/typicons.font/typicons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/morris.js/morris.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/flag-icon-css/css/flag-icon.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('dashboard/lib/jqvmap/jqvmap.min.css') ?>" rel="stylesheet">

  <!-- azia CSS -->
  <link rel="stylesheet" href="<?= base_url('dashboard/css/azia.css') ?>">

</head>

<body class="az-body az-body-sidebar">

  <div class="az-sidebar">
    <div class="az-sidebar-header">
      <a href="index.html">
        <h3 class="text-success"><strong>Nucafe Grading Limited</strong></h3>
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
          <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Apps &amp; Pages</a>
          <ul class="nav-sub">
            <li class="nav-sub-item">
              <a href="app-mail.html" class="nav-sub-link">Mailbox</a>
            </li>
            <li class="nav-sub-item">
              <a href="app-chat.html" class="nav-sub-link">Chat</a>
            </li>
            <li class="nav-sub-item">
              <a href="app-calendar.html" class="nav-sub-link">Calendar</a>
            </li>
            <li class="nav-sub-item">
              <a href="app-contacts.html" class="nav-sub-link">Contacts</a>
            </li>
            <li class="nav-sub-item"><a href="page-profile.html" class="nav-sub-link">Profile</a></li>
            <li class="nav-sub-item"><a href="page-invoice.html" class="nav-sub-link">Invoice</a></li>
            <li class="nav-sub-item"><a href="page-signin.html" class="nav-sub-link">Sign In</a></li>
            <li class="nav-sub-item"><a href="page-signup.html" class="nav-sub-link">Sign Up</a></li>
            <li class="nav-sub-item"><a href="page-404.html" class="nav-sub-link">Page 404</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i>UI Elements</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="elem-accordion.html" class="nav-sub-link">Accordion</a></li>
            <li class="nav-sub-item"><a href="elem-alerts.html" class="nav-sub-link">Alerts</a></li>
            <li class="nav-sub-item"><a href="elem-avatar.html" class="nav-sub-link">Avatar</a></li>
            <li class="nav-sub-item"><a href="elem-badge.html" class="nav-sub-link">Badge</a></li>
            <li class="nav-sub-item"><a href="elem-breadcrumbs.html" class="nav-sub-link">Breadcrumbs</a></li>
            <li class="nav-sub-item"><a href="elem-buttons.html" class="nav-sub-link">Buttons</a></li>
            <li class="nav-sub-item"><a href="elem-cards.html" class="nav-sub-link">Cards</a></li>
            <li class="nav-sub-item"><a href="elem-carousel.html" class="nav-sub-link">Carousel</a></li>
            <li class="nav-sub-item"><a href="elem-collapse.html" class="nav-sub-link">Collapse</a></li>
            <li class="nav-sub-item"><a href="elem-dropdown.html" class="nav-sub-link">Dropdown</a></li>
            <li class="nav-sub-item"><a href="elem-icons.html" class="nav-sub-link">Icons</a></li>
            <li class="nav-sub-item"><a href="elem-images.html" class="nav-sub-link">Images</a></li>
            <li class="nav-sub-item"><a href="elem-list-group.html" class="nav-sub-link">List Group</a></li>
            <li class="nav-sub-item"><a href="elem-media-object.html" class="nav-sub-link">Media Object</a></li>
            <li class="nav-sub-item"><a href="elem-modals.html" class="nav-sub-link">Modals</a></li>
            <li class="nav-sub-item"><a href="elem-navigation.html" class="nav-sub-link">Navigation</a></li>
            <li class="nav-sub-item"><a href="elem-pagination.html" class="nav-sub-link">Pagination</a></li>
            <li class="nav-sub-item"><a href="elem-popover.html" class="nav-sub-link">Popover</a></li>
            <li class="nav-sub-item"><a href="elem-progress.html" class="nav-sub-link">Progress</a></li>
            <li class="nav-sub-item"><a href="elem-spinners.html" class="nav-sub-link">Spinners</a></li>
            <li class="nav-sub-item"><a href="elem-toast.html" class="nav-sub-link">Toast</a></li>
            <li class="nav-sub-item"><a href="elem-tooltip.html" class="nav-sub-link">Tooltip</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i>Forms</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="form-elements.html" class="nav-sub-link">Form Elements</a></li>
            <li class="nav-sub-item"><a href="form-layouts.html" class="nav-sub-link">Form Layouts</a></li>
            <li class="nav-sub-item"><a href="form-validation.html" class="nav-sub-link">Form Validation</a></li>
            <li class="nav-sub-item"><a href="form-wizards.html" class="nav-sub-link">Form Wizards</a></li>
            <li class="nav-sub-item"><a href="form-editor.html" class="nav-sub-link">WYSIWYG Editor</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Charts</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="chart-morris.html" class="nav-sub-link">Morris Charts</a></li>
            <li class="nav-sub-item"><a href="chart-flot.html" class="nav-sub-link">Flot Charts</a></li>
            <li class="nav-sub-item"><a href="chart-chartjs.html" class="nav-sub-link">ChartJS</a></li>
            <li class="nav-sub-item"><a href="chart-sparkline.html" class="nav-sub-link">Sparkline</a></li>
            <li class="nav-sub-item"><a href="chart-peity.html" class="nav-sub-link">Peity</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-map"></i>Maps</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="map-google.html" class="nav-sub-link">Google Maps</a></li>
            <li class="nav-sub-item"><a href="map-leaflet.html" class="nav-sub-link">Leaflet</a></li>
            <li class="nav-sub-item"><a href="map-vector.html" class="nav-sub-link">Vector Maps</a></li>
          </ul>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="" class="nav-link with-sub"><i class="typcn typcn-tabs-outline"></i>Tables</a>
          <ul class="nav-sub">
            <li class="nav-sub-item"><a href="table-basic.html" class="nav-sub-link">Basic Tables</a></li>
            <li class="nav-sub-item"><a href="table-data.html" class="nav-sub-link">Data Tables</a></li>
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
                <span><?=$commonData['user']['name']?></span>
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

  <script src="<?= base_url('dashboard/js/azia.js') ?>"></script>
  <script>
     $(function () {
     'use strict'

     $('.az-sidebar .with-sub').on('click', function (e) {
     e.preventDefault();
     $(this).parent().toggleClass('show');
     $(this).parent().siblings().removeClass('show');
     })

     $(document).on('click touchstart', function (e) {
     e.stopPropagation();

     // closing of sidebar menu when clicking outside of it
     if (!$(e.target).closest('.az-header-menu-icon').length) {
     var sidebarTarg = $(e.target).closest('.az-sidebar').length;
     if (!sidebarTarg) {
     $('body').removeClass('az-sidebar-show');
     }
     }
     });


     $('#azSidebarToggle').on('click', function (e) {
     e.preventDefault();

     if (window.matchMedia('(min-width: 992px)').matches) {
     $('body').toggleClass('az-sidebar-hide');
     } else {
     $('body').toggleClass('az-sidebar-show');
     }
     })
    })
  </script>
  <!--placeholder for our extra scripts-->
  <?= $this->renderSection('scripts') ?>
</body>

</html>